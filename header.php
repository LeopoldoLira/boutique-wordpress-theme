<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    
    <?php wp_head();?>
</head>
<body <?php body_class();?>>

<header class='header'>
    <div class="header__logo">
        <?$HEADER_LOGO = get_field('header_logo', 'option')?>
        <a href='<?=home_url();?>'><img src="<?=$HEADER_LOGO;?>" alt=""></a>
    </div>
    <nav class="header__navigation">
        <ul>
            <li><a href="/"><img src='http://darlingboutique.local/wp-content/uploads/2024/08/inicio-icon.png'/></a></li>
            <li><a href="/catalogo"><img src='http://darlingboutique.local/wp-content/uploads/2024/08/tienda-icon.png'/></a></li>
            <li><a href="/contacto"><img src='http://darlingboutique.local/wp-content/uploads/2024/08/contactanos-icon.png'/></a></li>
        </ul>
    </nav>
</header>