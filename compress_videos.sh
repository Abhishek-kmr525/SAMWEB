#!/bin/bash

echo "Starting media compression..."

# 1. Compress Videos using ffmpeg
videos=(
    "assets/02-SamSport-2025_SOR-WBA_30s-01A.mp4"
    "assets/videos/01-SAM_HP_ProdFam-01A.mp4"
    "assets/videos/02-SAM_PP_Prod20-01A.mp4"
)

for vid in "${videos[@]}"; do
    if [ -f "$vid" ]; then
        echo "Compressing video: $vid"
        temp_vid="${vid%.*}_compressed.mp4"
        # Compress video to a temporary file
        ffmpeg -y -i "$vid" -vcodec libx264 -crf 28 -preset fast -acodec aac "$temp_vid"
        
        # Replace original with compressed version if successful
        if [ $? -eq 0 ]; then
            mv "$temp_vid" "$vid"
            echo "Successfully compressed $vid"
        else
            echo "Failed to compress $vid"
        fi
    else
        echo "Video not found: $vid"
    fi
done

echo "Media compression completed!"
