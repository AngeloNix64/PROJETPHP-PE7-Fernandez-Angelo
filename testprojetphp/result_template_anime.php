<!-- result_template_anime.php -->
<br>
<div class="rounded-lg max-w-lg bg-gray-900 text-white anime-result p-4 w-1/7 mx-2 mb-4">
    <a href="anime_details.php?id=<?= $row['id'] ?>" class="text-[28,185,244] hover:underline">
        <img width="200" height="325" src="<?= $row['cover_image_anime'] ?>" alt="<?= $row['name'] ?>" class="h-72 mb-2">
        <h3 class="text-lg font-bold"><?= $row['name'] ?></h3>
    </a>
    <p class="text-sm"><?= $row['release_year'] ?></p>
</div>
<br>
