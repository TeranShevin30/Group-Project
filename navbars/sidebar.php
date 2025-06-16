<?php
$menu_items = [
    ['icon' => 'house-door', 'text' => 'Dashboard', 'active' => true],
    ['icon' => 'people', 'text' => 'Customers'],
    ['icon' => 'geo-alt', 'text' => 'Routes'],
    ['icon' => 'truck', 'text' => 'Vehicles'],
    ['icon' => 'clipboard-check', 'text' => 'Orders'],
    ['icon' => 'box', 'text' => 'Inventory'],
    ['icon' => 'graph-up', 'text' => 'Sales Summary']
];
?>

<nav class="col-md-3 col-lg-2 d-md-block bg-light sidebar">
    <div class="position-sticky pt-3">
        <ul class="nav flex-column">
            <?php foreach ($menu_items as $item): ?>
                <li class="nav-item">
                    <a class="nav-link <?php echo isset($item['active']) && $item['active'] ? 'active' : ''; ?>" href="#">
                        <i class="bi bi-<?php echo $item['icon']; ?>"></i>
                        <?php echo $item['text']; ?>
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
</nav>
