<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Dynamic Left Panel with Database</title>
<style>
    body {
        display: flex;
        height: 100vh;
        margin: 0;
        font-family: Arial, sans-serif;
    }
    .left-panel {
        width: 200px;
        background-color: #333;
        color: #fff;
        padding: 20px;
        box-sizing: border-box;
        overflow-y: auto;
    }
    .left-panel h2 {
        margin-top: 0;
    }
    .left-panel .menu-item {
        cursor: pointer;
        padding: 10px 5px;
        border-bottom: 1px solid #444;
    }
    .left-panel .menu-item:hover {
        background-color: #444;
    }
    .right-panel {
        flex: 1;
        padding: 20px;
        box-sizing: border-box;
        background-color: #f4f4f4;
    }
</style>
</head>
<body>

<div class="left-panel">
    <h2>Menu</h2>
    <div id="menu-items">ll</div>
    <div id="menu-items">ll</div>
</div>

<div class="right-panel" id="content-area">
    <h2>Welcome</h2>
    <p>Select an item from the menu to view its content.</p>
</div>

<script>
    // Fetch rows from the database and display them in the left panel
    async function fetchMenuItems() {
        try {
            const response = await fetch('getMenuItems.php');
            const data = await response.json();
            displayMenuItems(data);
        } catch (error) {
            console.error('Error fetching menu items:', error);
        }
    }

    // Display menu items in the left panel
    function displayMenuItems(items) {
        const menuContainer = document.getElementById('menu-items');
        menuContainer.innerHTML = ''; // Clear previous items

        items.forEach(item => {
            const itemDiv = document.createElement('div');
            itemDiv.className = 'menu-item';
            itemDiv.textContent = item.name;
            itemDiv.onclick = () => showContent(item.name);
            menuContainer.appendChild(itemDiv);
        });
    }

    // Display content in the right panel
    function showContent(content) {
        document.getElementById('content-area').innerHTML = `<h2>${content}</h2><p>This is the content for ${content}.</p>`;
    }

    // Initial fetch of menu items
    fetchMenuItems();
</script>

</body>
</html>
