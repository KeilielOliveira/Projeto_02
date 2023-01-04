<html>
<head>
    <link rel="stylesheet" href="css/editar-home.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,700;1,300;1,400;1,700&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/9513630920.js" crossorigin="anonymous"></script>
</head>
<body>
    
    <header>
        <h2>Bem vindo a pagina de <b>edição</b> da home!</h2>
    </header>

    <div class="box-edit">
        <div class="title">
            <i class="fa-solid fa-pen"></i>
            <h3>Editar Header</h3>
        </div>
        <div class="content">
            <form method="post">
                <label>Logomarca</label>
                <input type="text" name="logo" placeholder="Logomarca em forma de Texto...">
                <input type="file" name="logo_image">
            </form>
            <br>
            <br>
            <h3>Itens do menu</h3>
            <br>
            <div class="item">
                <p>Name</p>
                <p>link</p>
                <a href=""><i class="fa-solid fa-pen">  Editar</i></a>
                <a href=""><i class="fa-regular fa-trash-can">  Excluir</i></a>
            </div>
        </div>
        <input type="submit" value="send" class="send">
    </div>

    <div class="box-edit">
        <div class="title">
            <i class="fa-solid fa-pen"></i>
            <h3>Editar Banner</h3>
        </div>
        <div class="content">
            <form method="post">
                <label>Imagem do banner</label>
                <input type="file" name="banner_image">
                <label>Titulo da chamada</label>
                <input type="text" name="title_banner">
                <label>Conteudo da chamada</label>
                <input type="text" name="content-banner">
            </form>
        </div>
        <input type="submit" value="send" class="send">
    </div>

    <div class="box-edit">
        <div class="title">
            <i class="fa-solid fa-pen"></i>
            <h3>Editar Sobre</h3>
        </div>
        <div class="content">
            <form method="post">
                <label>Texto inicial do sobre</label>
                <textarea name="first_text_sobre"></textarea>
                <label>Texto é imagem do sobre</label>
                <textarea name="second_text_sobre"></textarea>
                <input type="file" name="first_image_sobre">
                <label>Banner do sobre</label>
                <input type="file" name="image_banner_sobre">
            </form>

            <div class="item">
                <p>Content</p>
                <p>name</p>
                <a href=""><i class="fa-solid fa-pen">  Editar</i></a>
                <a href=""><i class="fa-regular fa-trash-can">  Excluir</i></a>
            </div>

            <form method="post">
                <label>Titulo da seçao trabalho</label>
                <input type="text" name="title_work">
            </form>

            <div class="item">
                <p>Title</p>
                <p>Content</p>
                <a href=""><i class="fa-solid fa-pen">  Editar</i></a>
                <a href=""><i class="fa-regular fa-trash-can">  Excluir</i></a>
            </div>
        </div>
        <input type="submit" value="send" class="send">
    </div>

</body>
</html>