<!-- result_template.php -->
<br>
<div class="rounded-lg max-w-lg bg-gray-900 text-white manga-result p-4 w-1/7 mx-2 mb-4 fade-in-out">
    <a href="manga_details.php?id=<?= $row['id'] ?>" class="text-[28,185,244] hover:underline">
        <img width="200" height="325" src="<?= $row['cover_image_volume'] ?>" alt="<?= $row['name'] ?>" class="h-72 mb-2">
        <h3 class="text-lg font-bold"><?= $row['name'] ?></h3>
    </a>

    <?php if (isset($row['released_date'])): ?>
        <?php $releaseYear = date('Y', strtotime($row['released_date'])); ?>
        <p class="text-sm"><?= htmlspecialchars($releaseYear) ?></p>
    <?php endif; ?>
    <?php if (!isset($row['released_date'])): ?>
        <?php $releaseYear = date('Y', strtotime($row['release_year'])); ?>
    <p class="text-sm"><?= htmlspecialchars($row['release_year']) ?></p>
    <?php endif; ?>
</div>
<br>