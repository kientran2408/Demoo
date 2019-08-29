<nav>
    <style>
        body{
            background-color:gray;
        }
    </style> 
    
    <ul>
        <li>
            <a href=""style="border: black 1px solid; background-color: white;
               text-decoration: none; color: red;"
               >Manage Catalogue</a>
            <ul>
                <li>
                    <a href="addcatalogue.php"style="border: black 1px solid; background-color: white; 
                       text-decoration: none; color: red; " 
                       >Add Catalogue</a>
                </li>
                <li>
                    <a href="loadcatalogue.php"style="border: black 1px solid; background-color: white;
                       text-decoration: none; color: red;"
                       >View/Search/Update/Delete catalogue</a>
                </li>
            </ul>
        </li>
        <li>
            <a href=""style="border: black 1px solid; background-color: white; 
               text-decoration: none; color: red;"
               >Manage Items</a>
            <ul>
                    <a href="additem.php" style="border: black 1px solid; background-color: white;
                    text-decoration: none; color: red;"
                    >Add Item</a>
                </li>
                <li><a href="loaditem.php" style="border: black 1px solid; background-color: white;
                    text-decoration: none; color: red;"
                    >View/Search/Update/Delete item</a></li>
            </ul>
        </li>
        <li>
            <a href="logout.php" style="border: black 1px solid; background-color: white;
                    text-decoration: none; color: red;"
               >Logout <?php echo $userstr; ?></a>
        </li>
    </ul>
</nav>