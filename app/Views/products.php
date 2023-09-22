<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Croissant+One&family=Nunito:wght@500&display=swap');
    @import url('https://fonts.googleapis.com/css2?family=Croissant+One&family=Lato&family=Nunito:wght@500&display=swap');
    * {
        margin:0;
        padding:0;
    }
    html,
      body {
        margin: 0;
        padding: 0;
      }
      body {
        height: 100%;
        width: 100%;
      }
    label {
        color:white;
        min-width:80px;
        display: inline-block;
        margin-bottom:5px;
        font-family: 'Lato', sans-serif;
    }
    .inp {
        margin-bottom:5px;
        display: inline-block;
        padding:5px;
        border-radius:10px;
        width: 40%
        font-family: 'Lato', sans-serif;
    }
    h2 {
        font-family: 'Lato', sans-serif;
    }
    h4 {
        font-family: 'Lato', sans-serif;
    }
    ul {
        font-family: 'Lato', sans-serif;
        width: 100%;
        list-style-type: square;
    }
    td{
        text-align: center
    }
    a {
        color:white
    }
    a:visited {
        color: white;
    }
    a:hover {
        color: gray;
    }
    hr {
        border: solid 3px;
        width:50%
    }
    .hov:hover {
        background-color:gray;
    }

    </style>
<body style="background-image:url('https://s11.gifyu.com/images/S4IzR.gif');background-repeat:no-repeat;background-attachment:fixed;background-size:cover;">
<!--GIF by Gustavo Rezende from Pixabay-->
<!--STRICTLY FOR EDUCATIONAL PURPOSES ONLY-->

<!-- BANNER -->
<div style="background-color:black;color:white;padding:10px;font-family:'Croissant One', cursive !important;margin-bottom:0">
	<h1>Product Listing</h1>
</div>
<!-- END OF BANNER -->

<!-- HEADER -->
<h2 style='margin:10px'>Manage Products</h2>
<hr>
<!-- END FOR HEADER -->

<!-- CONTAINER -->
<div style="display:flex.flex-direction:column">

<!--CRUD PRODUCTS -->
<div style='float:left;overflow:auto;background-color:black;margin:20px;border-radius:20px;padding:30px;width:42%;'>
<h2 style='color:white'>Add/Edit Products</h2>
<hr style="color:white;width:98% !important;border:solid 1px !important">
<form action='/save' method='post'>
<br>
<input type='hidden' name='ID' value='<?php if(isset($pro['ID'])): ?><?= $pro['ID']; endif; ?>'>
    <label>Product Name:</label>
    <input class='inp' type='text' name='ProductName' placeholder='ProductName' value='<?php if(isset($pro['ProductName'])): ?><?= $pro['ProductName']; endif; ?>' required>
    <br>
    <label>Product Description:</label>
    <input class='inp' type='text' name='ProductDescription' placeholder='ProductDescription' value='<?php if(isset($pro['ProductDescription'])): ?><?= $pro['ProductDescription']; endif; ?>' required>
    <br>
    <label>Product Category:</label>
    <select class ='inp' id='ProductCategory' name='ProductCategory'>
        <option>Select a Category</option>
        <?php foreach($category as $ca) {
            echo "<option value =".$ca['ProductCategory'].">".$ca['ProductCategory']."</option>";
        } ?>
    </select>
    <br>
    <label>Product Quantity:</label>
    <input class='inp' type='text' name='ProductQuantity' placeholder='ProductQuantity' value='<?php if(isset($pro['ProductQuantity'])): ?><?= $pro['ProductQuantity']; endif; ?>' required>
    <br>
    <label>Product Price:</label>
    <input class='inp' type='text' name='ProductPrice' placeholder='ProductPrice' value='<?php if(isset($pro['ProductPrice'])): ?><?= $pro['ProductPrice']; endif; ?>' required>
    <br>
    <input class='hov' style='float:right;border-radius:20px;width:25%;font-size:20px;padding:5px' type='submit' placeholder='save_p'>
</form>
    </div>
    <!-- END OF CRUD PRODUCTS -->

    <!-- TABLE OF PRODUCTS AND LIST OF CATEGORIES -->
    <div style='float:right;overflow:auto;background-color:black;margin:20px;border-radius:20px;padding:30px;width:42%;color:white;'>
    <center>
    <h2 style='color:white'>Products' Table</h2>
<?php foreach($product as $pr):?>
<ul>
    <hr style="color:white;width:98% !important;border:solid .2px !important">
    <li>Product Name: <?= $pr['ProductName']?></li>
    <hr style="color:white;width:98% !important;border:solid .2px !important">
    <li>Product Description: <?= $pr['ProductDescription']?></li>
    <li>Product Category: <?= $pr['ProductCategory']?></li>
    <li>Product Quantity: <?= $pr['ProductQuantity']?></li>
    <li>Product Price: <?= $pr['ProductPrice']?></li>
    <li>Action: <a href="/delete/<?= $pr['ID'] ?>">Delete</a> | <a href="/edit/<?= $pr['ID'] ?>">Edit</a></li>
    <br>
</ul>
<?php endforeach; ?>
<hr style="color:white;width:98% !important;border:solid 1px !important">
</center>
</div>
<!-- END FOR TABLE OF PRODUCTS-->

<!-- CRUD FOR CATEGORIES -->
<div style='float:left;overflow:auto;background-color:black;margin:20px;border-radius:20px;padding:30px;width:42%;color:white'>
<h2 style='color:white'>Add/Edit Categories</h2>
<hr style="color:white;width:98% !important;border:solid 1px !important">
<br>
<form action="/save_c" method='post'>
<input type='hidden' name='ID' value='<?php if(isset($categ['ID'])): ?><?= $categ['ID']; endif; ?>'>
<label>Product Category:</label>
<input class='inp' type='text' name='ProductCategory' placeholder='ProductCategory' value='<?php if(isset($categ['ProductCategory'])): ?><?= $categ['ProductCategory']; endif; ?>' required>
<br>
<input class='hov' style='float:right;border-radius:20px;width:25%;font-size:20px;padding:5px' type='submit' placeholder='save_c'>
</div>
<!--END FOR CRUD FOR CATEGORIES -->

<!-- LIST OF CATEGORIES -->
<div style='float:right;overflow:auto;background-color:black;margin:20px;border-radius:20px;padding:30px;width:42%;color:white;font-family:"lato", "sans-serif"'>
<center>
<h2 style='color:white'>List of Categories</h2>
<hr style="color:white;width:99% !important;border:solid 1px !important">
</center>
<ul>
<?php foreach($category as $ca): ?>
    <li style='white-space: pre'><?=$ca['ProductCategory'] ?>
    <pre style='text-align:right !important'><a href='/delete_c/<?= $ca['ID'] ?>'>Delete</a> | <a href='/edit_c/<?= $ca['ID'] ?>'>Edit</a></pre></li>
    <?php endforeach; ?>
</ul>
<hr style="color:white;width:99% !important;border:solid 1px !important">
<center>
<h4><pre>For educational purposes only
<a href='https://pixabay.com/gifs/houses-village-building-loop-5002/' target='_blank'>GIF by Gustavo Rezende from Pixabay</a>
</pre>
    </center>
</h4>
</div>
<!-- END FOR LIST OF CATEGORIES -->

<!-- END FOR CONTAINER -->
</body>
</html>