#!/usr/bin/env bash
# Génère les dérivés .thumb.webp (500px, vignette) et .display.webp (1600px,
# modale) pour chaque image de images/galerie/, sans jamais toucher aux
# originaux. Ne régénère pas les dérivés déjà à jour (comparaison de date).
#
# Usage :
#   scripts/optimize-galerie.sh                # traite toute la galerie
#   scripts/optimize-galerie.sh fichier1 ...    # traite uniquement ces fichiers (hook pre-commit)
set -euo pipefail

GALERIE_DIR="${GALERIE_DIR:-images/galerie}"
THUMB_WIDTH=500
THUMB_QUALITY=75
DISPLAY_WIDTH=1600
DISPLAY_QUALITY=82

SCRIPT_DIR="$(cd -- "$(dirname -- "${BASH_SOURCE[0]}")" >/dev/null 2>&1 && pwd)"
REPO_ROOT="$(cd -- "$SCRIPT_DIR/.." >/dev/null 2>&1 && pwd)"
cd "$REPO_ROOT"

if ! command -v convert >/dev/null 2>&1; then
  echo "Erreur : ImageMagick (convert) est introuvable. Installez-le (ex. sudo apt install imagemagick)." >&2
  exit 1
fi

processed=0
skipped=0
total_before=0
total_after=0

human() {
  numfmt --to=iec-i --suffix=B "$1" 2>/dev/null || echo "$1 o"
}

process_one() {
  local src="$1"
  [[ -f "$src" ]] || return
  local dir base ext lower_ext
  dir="$(dirname -- "$src")"
  base="$(basename -- "$src")"
  ext="${base##*.}"
  base="${base%.*}"
  lower_ext="$(printf '%s' "$ext" | tr '[:upper:]' '[:lower:]')"

  case "$lower_ext" in
    jpg|jpeg|png|webp) ;;
    *) return ;;
  esac

  case "$base" in
    *.thumb|*.display) return ;;
  esac

  local thumb="$dir/$base.thumb.webp"
  local display="$dir/$base.display.webp"
  local need_thumb=1 need_display=1

  [[ -f "$thumb" && "$thumb" -nt "$src" ]] && need_thumb=0
  [[ -f "$display" && "$display" -nt "$src" ]] && need_display=0

  if [[ $need_thumb -eq 0 && $need_display -eq 0 ]]; then
    skipped=$((skipped + 1))
    return
  fi

  local src_size
  src_size=$(stat -c%s -- "$src")

  if [[ $need_thumb -eq 1 ]]; then
    convert "$src" -auto-orient -strip -resize "${THUMB_WIDTH}x>" -quality "$THUMB_QUALITY" "$thumb"
    echo "  vignette  -> ${thumb#"$REPO_ROOT"/}"
  fi
  if [[ $need_display -eq 1 ]]; then
    convert "$src" -auto-orient -strip -resize "${DISPLAY_WIDTH}x>" -quality "$DISPLAY_QUALITY" "$display"
    echo "  affichage -> ${display#"$REPO_ROOT"/}"
  fi

  processed=$((processed + 1))
  total_before=$((total_before + src_size))
  total_after=$((total_after + $(stat -c%s -- "$thumb") + $(stat -c%s -- "$display")))
}

if [[ $# -gt 0 ]]; then
  for f in "$@"; do
    process_one "$f"
  done
else
  while IFS= read -r -d '' f; do
    process_one "$f"
  done < <(find "$GALERIE_DIR" -type f \( -iname '*.jpg' -o -iname '*.jpeg' -o -iname '*.png' -o -iname '*.webp' \) -print0)
fi

echo
echo "Résumé : $processed image(s) traitée(s), $skipped déjà à jour."
if [[ $processed -gt 0 ]]; then
  echo "Poids original (images traitées) : $(human "$total_before")"
  echo "Poids dérivés générés             : $(human "$total_after")"
fi
