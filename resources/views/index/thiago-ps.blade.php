<!DOCTYPE html>
@extends('layouts.app-index')
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Thiago Pontes Soares - Desenvolvedor WEB</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
             body {
            font-family: 'Poppins', sans-serif;
            background: #fafafa;
            }
            
            p {
            font-family: 'Poppins', sans-serif;
            font-size: 1.1em;
            font-weight: 300;
            line-height: 1.7em;
            color: #999;
            }
            
            a,
            a:hover,
            a:focus {
            color: inherit;
            text-decoration: none;
            transition: all 0.3s;
            }
            
            .navbar {
            padding: 15px 10px;
            background: #fff;
            border: none;
            border-radius: 0;
            margin-bottom: 40px;
            box-shadow: 1px 1px 3px rgba(0, 0, 0, 0.1);
            }
            
            .navbar-btn {
            box-shadow: none;
            outline: none !important;
            border: none;
            }
            
            .line {
            width: 100%;
            height: 1px;
            border-bottom: 1px dashed #ddd;
            margin: 40px 0;
            }
            
            #sidebar {
            width: 250px;
            position: fixed;
            top: 0;
            left: 0;
            height: 100vh;
            z-index: 999;
            background:#4f768f;
            color: #fff !important;
            transition: all 0.3s;
            }
            
            #sidebar.active {
            margin-left: -250px;
            }
            
            #sidebar .sidebar-header {
            padding: 20px;
            background: #6d7fcc;
            }
            
            #sidebar ul.components {
            padding: 20px 0;
            border-bottom: 1px solid #47748b;
            }
            
            #sidebar ul p {
            color: #fff;
            padding: 10px;
            }
            
            #sidebar ul li a {
            padding: 10px;
            font-size: 1.1em;
            display: block;
            color:white;
            }
            
            #sidebar ul li a:hover {
            color: #7386D5;
            background: #fff;
            }
            
            #sidebar ul li.active>a,
            a[aria-expanded="true"] {
            color: #fff;
            background: #6d7fcc;
            }
            
            a[data-toggle="collapse"] {
            position: relative;
            }
            
            a[aria-expanded="false"]::before,
            a[aria-expanded="true"]::before {
            content: '\e259';
            display: block;
            position: absolute;
            right: 20px;
            font-family: 'Glyphicons Halflings';
            font-size: 0.6em;
            }
            
            a[aria-expanded="true"]::before {
            content: '\e260';
            }
            
            ul ul a {
            font-size: 0.9em !important;
            padding-left: 30px !important;
            background: #6d7fcc;
            }
            
            ul.CTAs {
            padding: 20px;
            }
            
            ul.CTAs a {
            text-align: center;
            font-size: 0.9em !important;
            display: block;
            border-radius: 5px;
            margin-bottom: 5px;
            }
            
            a.download {
            background: #fff;
            color: #7386D5;
            }
            
            a.article,
            a.article:hover {
            background: #6d7fcc !important;
            color: #fff !important;
            }
            /* ---------------------------------------------------
            CONTENT STYLE
        ----------------------------------------------------- */
            
            #content {
            width: calc(100% - 250px);
            padding: 40px;
            min-height: 100vh;
            transition: all 0.3s;
            position: absolute;
            top: 0;
            right: 0;
            }
            
            #content.active {
            width: 100%;
            }
            /* ---------------------------------------------------
            MEDIAQUERIES
        ----------------------------------------------------- */
            
            @media (max-width: 768px) {
            #sidebar {
                margin-left: -250px;
            }
            #sidebar.active {
                margin-left: 0;
            }
            #content {
                width: 100%;
            }
            #content.active {
                width: calc(100% - 250px);
            }
            #sidebarCollapse span {
                display: none;
            }
            }

            h2,h3{
              font-family: 'Bahnschrift';
            }
        </style>
        <script>
          $("textarea").resizable();
        </script>
    </head>
    <body>
        <div class="wrapper">
            <!-- Sidebar Holder -->
            <nav id="sidebar">
              <div class="sidebar-header">
                <center>  
                    <img src="{{url("storage/thiago/thiagops.jpg")}}" class="rounded-circle" height="150px" width='150px'>
                    <h3>Thiago Pontes <span style='color:#3b5a6e'>Soares</span></h3>
                </center>
              </div>
        
              <ul class="list-unstyled components">
                <li class="active">
                  <a href="#sobre">Sobre mim</a>
                </li>
                <li>
                  <a href="#portfolio">Portfólio </a>
                </li>
                <li>
                  <a href="#habilidades">Habilidades</a>
                </li>
                <li>
                  <a href="#experiencia">Experiência</a>
                </li>
                <li>
                  <a href="#contatos">Contatos</a>
                </li>
        
              </ul>
        
        
            </nav>
        
            <!-- Page Content Holder -->
            <div id="content">
        
              <nav class="navbar navbar-default">
                <div class="container-fluid">
        
                  <div class="navbar-header">
                    <button type="button" id="sidebarCollapse" class="btn btn-info navbar-btn">
                        <i class="fas fa-bars"></i>
                                        
                    </button>
                  </div>
                  
                  

                </div>
              </nav>

              <div id="sobre">
                <hr>
                <h2>SOBRE MIM</h2>
                
                @foreach ($sobres as $sobre)
                  <div class="card">
                    <div class="row no-gutters">
                        <div class="col-auto">
                          @if ($sobre->imagem)
                            <img class="img-fluid" src='{{url("storage/$sobre->imagem")}}' alt='{{$sobre->titulo}}'  style='width:100px; height=100px;'>
                        @endif
                        </div>
                        <div class="col">
                            <div class="card-block px-2"><hr>
                                <h4 class="card-title">{{$sobre->titulo}}</h4>
                                <p class="card-text" style='
                                white-space: pre-line'>{{$sobre->mensagem}}</p>
                                
                            </div>
                        </div>
                    </div>
                  </div>
                @endforeach
              
              </div><br/><br/><br/><br/><!-- sobre -->

              <div id="portfolio">
                <hr>
                <h2>MEU PORTFÓLIO</h2>
                
                @foreach ($projetos as $projeto)
                  <div class="card"><br>
                    <div class="row no-gutters">
                        <div class="col-auto">
                          @if ($projeto->imagem)
                            <img class="img-fluid" src='{{url("storage/$projeto->imagem")}}' alt='{{$projeto->titulo}}'  style='width:100px; height=100px;'>
                          @endif
                        </div>
                        <div class="col">
                            <div class="card-block px-2"><hr>
                                <h4 class="card-title">{{$projeto->nome}}</h4>
                                <p class="card-text" style='
                                white-space: pre-line'>{{$projeto->descricao}}</p>
                                @if ($projeto->link)
                                <a target="_blank" href="{{$projeto->link}}" class="btn btn-primary">{{$projeto->nome}}</a><br><br>
                                @endif
                              </div>
                        </div>
                    </div>
                  </div>
                @endforeach
              
              </div><br/><br/><br/><br/><!-- portifolio -->
              
              <div id="habilidades">
                <hr>
                <h2>MINHAS HABILIDADES</h2>
                <div class="card">
                  <div class='container'>
                    <div class="row">
                      <div class="col-sm">
                        <p>Tecnologias:</p>
                        <ul style='list-style-type: none;
                        margin: 0;
                        padding: 0;'>
                          @foreach ($habilidades as $habilidade)
                              @if ($habilidade->tipo == 'Tecnologias')
                                  <li>
                                    @if ($habilidade->imagem)
                                        <img class="img-fluid" src='{{url("storage/$habilidade->imagem")}}' alt='{{$habilidade->titulo}}'  style='width:30px; height=30px;'>
                                    @endif - {{$habilidade->nome}}
                                  </li>
                              @endif
                          @endforeach
                          </ul>    

                          <p>Banco de Dados:</p>
                          <ul style='list-style-type: none;
                          margin: 0;
                          padding: 0;'>
                            @foreach ($habilidades as $habilidade)
                                @if ($habilidade->tipo == 'Banco de Dados')
                                    <li>
                                      @if ($habilidade->imagem)
                                          <img class="img-fluid" src='{{url("storage/$habilidade->imagem")}}' alt='{{$habilidade->titulo}}'  style='width:30px; height=30px;'>
                                      @endif - {{$habilidade->nome}}
                                    </li>
                                @endif
                            @endforeach
                            </ul>    
                      </div>

                      <div class="col-sm">
                        <p>Frameworks e Bibliotecas:</p>
                        <ul style='list-style-type: none;
                        margin: 0;
                        padding: 0;'>
                          @foreach ($habilidades as $habilidade)
                              @if ($habilidade->tipo == 'Framework')
                                  <li>
                                    @if ($habilidade->imagem)
                                        <img class="img-fluid" src='{{url("storage/$habilidade->imagem")}}' alt='{{$habilidade->titulo}}'  style='width:30px; height=30px;'>
                                    @endif - {{$habilidade->nome}}
                                  </li>
                              @endif
                          @endforeach
                          </ul>  
                          
                          <p>Outros:</p>
                          <ul style='list-style-type: none;
                          margin: 0;
                          padding: 0;'>
                            @foreach ($habilidades as $habilidade)
                                @if ($habilidade->tipo == 'Outros')
                                    <li>
                                      @if ($habilidade->imagem)
                                          <img class="img-fluid" src='{{url("storage/$habilidade->imagem")}}' alt='{{$habilidade->titulo}}'  style='width:30px; height=30px;'>
                                      @endif - {{$habilidade->nome}}
                                    </li>
                                @endif
                            @endforeach
                            </ul> 
                      </div>
                      
                    </div>
                  
                </div>  
              </div>
            </div><br/><br/><br/><br/><!-- habilidades -->

              <div id="experiencia">
                <hr>
                <h2>EXPERIÊNCIA PROFISSIONAL</h2>
                
                @foreach ($experiencias as $experiencia)
                  <div class="card">
                    <div class="row no-gutters">
                        <div class="col-auto">
                          @if ($experiencia->imagem)
                            <img class="img-fluid" src='{{url("storage/$experiencia->imagem")}}' alt='{{$experiencia->titulo}}'  style='width:100px; height=100px;'>
                        @endif
                        </div>
                        <div class="col">
                            <div class="card-block px-2"><hr>
                                <h4 class="card-title">{{$experiencia->titulo}}</h4>
                                <p class="card-text" style='
                                    white-space: pre-line'>
                                  {{$experiencia->mensagem}}
                                </p>
                            </div>
                        </div>
                    </div>
                  </div>
                @endforeach
              
              </div><br/><br/><br/><br/><!-- experiencia -->

              <div id="contatos">
                <hr>
                <h2>CONTATOS E MÍDIAS</h2>
                <div class="card-deck">
                  @foreach ($contatos as $contato)
                    <div class="card ">
                      <div class="row no-gutters">
                          <div class="col-auto">
                            @if ($sobre->imagem)
                              <img class="img-fluid" src='{{url("storage/$contato->imagem")}}' alt='{{$contato->titulo}}'  style='width:50px; height=50px;'>
                          @endif
                          </div>
                          <div class="col">
                              <div class="card-block px-2">
                                  <p class="card-text">{{$contato->nome}}</p>
                                  @if ($contato->link)
                                  <p class="card-text"><a href="{{$contato->link}}" target="_blank">Acesse</a></p>
                                  @endif
                              </div>
                          </div>
                      </div>
                    </div>
                  @endforeach
              </div>
              </div><br/><!--contato-->
            </div>


          </div>
        
        
        
        
        
          <!-- jQuery CDN -->
          <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
          <!-- Bootstrap Js CDN -->
          <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
          <!-- jQuery Custom Scroller CDN -->
          <script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>
        
          <script type="text/javascript">
            $(document).ready(function() {
        
        
              $('#sidebarCollapse').on('click', function() {
                $('#sidebar, #content').toggleClass('active');
                $('.collapse.in').toggleClass('in');
                $('a[aria-expanded=true]').attr('aria-expanded', 'false');
              });
            });
          </script>
            
       
    </body>
</html>
