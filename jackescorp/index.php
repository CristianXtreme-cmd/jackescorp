<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>StyleJackets - Tienda de Chaquetas</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome para iconos -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- CSS Personalizado -->
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <!-- Header/Navbar -->
    <header class="header">
        <nav class="navbar navbar-expand-lg navbar-custom">
            <div class="container">
                <a class="navbar-brand" href="index.html">Style<span>Jackets</span></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link active" href="#">Inicio</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Productos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Nosotros</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Contacto</a>
                        </li>
                        <li class="nav-item ms-lg-3 mt-2 mt-lg-0">
                            <a class="btn btn-primary-custom" href="app/views/auth/login.php">Ingresar</a>
                        </li>
                        <!-- En el navbar, junto al botón de Ingresar -->
                        <li class="nav-item ms-lg-3 mt-2 mt-lg-0">
                            <a class="btn btn-outline-primary-custom" href="app/views/auth/register.php">Registrarse</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>


    <!-- Carousel Hero Section -->
    <section class="hero-section">
        <div id="chaquetasCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#chaquetasCarousel" data-bs-slide-to="0" class="active"></button>
                <button type="button" data-bs-target="#chaquetasCarousel" data-bs-slide-to="1"></button>
                <button type="button" data-bs-target="#chaquetasCarousel" data-bs-slide-to="2"></button>
                <button type="button" data-bs-target="#chaquetasCarousel" data-bs-slide-to="3"></button>
            </div>
            
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="https://images.unsplash.com/photo-1591047139829-d91aecb6caea?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80" alt="Chaqueta de Cuero">
                    <div class="carousel-caption">
                        <h2>Colección de Cuero</h2>
                        <p>Elegancia y durabilidad en cuero genuino</p>
                        <a href="#" class="btn btn-primary btn-lg">Ver Colección</a>
                    </div>
                </div>
                
                <div class="carousel-item">
                    <img src="https://images.unsplash.com/photo-1551028719-00167b16eac5?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80" alt="Chaqueta Denim">
                    <div class="carousel-caption">
                        <h2>Chaquetas Denim</h2>
                        <p>Estilo urbano con acabados premium</p>
                        <a href="#" class="btn btn-primary btn-lg">Ver Colección</a>
                    </div>
                </div>
                
                <div class="carousel-item">
                    <img src="https://images.unsplash.com/photo-1539533018447-63fcce2678e0?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80" alt="Chaqueta Impermeable">
                    <div class="carousel-caption">
                        <h2>Tecnología Impermeable</h2>
                        <p>Protección total sin sacrificar el estilo</p>
                        <a href="#" class="btn btn-primary btn-lg">Ver Colección</a>
                    </div>
                </div>
                
                <div class="carousel-item">
                    <img src="https://images.unsplash.com/photo-1551232864-3f0890e580d9?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80" alt="Chaqueta de Invierno">
                    <div class="carousel-caption">
                        <h2>Colección de Invierno</h2>
                        <p>Abrígate con estilo en temporada fría</p>
                        <a href="#" class="btn btn-primary btn-lg">Ver Colección</a>
                    </div>
                </div>
            </div>
            
            <button class="carousel-control-prev" type="button" data-bs-target="#chaquetasCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#chaquetasCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon"></span>
            </button>
        </div>
    </section>

    <!-- Productos Destacados -->
    <section class="featured-products py-5 bg-light">
        <div class="container">
            <h2 class="text-center mb-5">Nuestras Chaquetas Destacadas</h2>
            
            <div class="row g-4">
                <div class="col-md-6 col-lg-3">
                    <div class="card h-100 product-card">
                        <img src="https://images.unsplash.com/photo-1591047139829-d91aecb6caea?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=80" class="card-img-top" alt="Chaqueta de Cuero">
                        <div class="card-body">
                            <h5 class="card-title">Cuero Clásica</h5>
                            <p class="card-text">Elegancia atemporal en cuero genuino italiano.</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="price">$129.99</span>
                                <a href="#" class="btn btn-outline-primary">Ver Detalles</a>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-6 col-lg-3">
                    <div class="card h-100 product-card">
                        <img src="https://images.unsplash.com/photo-1551028719-00167b16eac5?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=80" class="card-img-top" alt="Chaqueta Denim">
                        <div class="card-body">
                            <h5 class="card-title">Denim Moderna</h5>
                            <p class="card-text">Estilo urbano con detalles en acabado premium.</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="price">$89.99</span>
                                <a href="#" class="btn btn-outline-primary">Ver Detalles</a>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-6 col-lg-3">
                    <div class="card h-100 product-card">
                        <img src="https://images.unsplash.com/photo-1539533018447-63fcce2678e0?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=80" class="card-img-top" alt="Chaqueta Impermeable">
                        <div class="card-body">
                            <h5 class="card-title">Impermeable</h5>
                            <p class="card-text">Protección total contra lluvia y viento.</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="price">$109.99</span>
                                <a href="#" class="btn btn-outline-primary">Ver Detalles</a>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-6 col-lg-3">
                    <div class="card h-100 product-card">
                        <img src="https://images.unsplash.com/photo-1594633312681-425c7b97ccd1?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=80" class="card-img-top" alt="Chaqueta de Invierno">
                        <div class="card-body">
                            <h5 class="card-title">Invierno Premium</h5>
                            <p class="card-text">Calidez y estilo para los días más fríos.</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="price">$149.99</span>
                                <a href="#" class="btn btn-outline-primary">Ver Detalles</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-dark text-white py-4">
        <div class="container">
            <div class="row">
                <div class="col-md-4 mb-4 mb-md-0">
                    <h5>StyleJackets</h5>
                    <p>Tienda especializada en chaquetas de alta calidad para todos los estilos.</p>
                </div>
                <div class="col-md-4 mb-4 mb-md-0">
                    <h5>Contacto</h5>
                    <ul class="list-unstyled">
                        <li><i class="fas fa-map-marker-alt me-2"></i> Av. Principal 123, Ciudad</li>
                        <li><i class="fas fa-phone me-2"></i> +1 234 567 890</li>
                        <li><i class="fas fa-envelope me-2"></i> info@stylejackets.com</li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <h5>Síguenos</h5>
                    <div class="social-icons">
                        <a href="#" class="text-white me-3"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="text-white me-3"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="text-white me-3"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="text-white"><i class="fab fa-pinterest"></i></a>
                    </div>
                </div>
            </div>
            <hr class="my-4 bg-secondary">
            <div class="text-center">
                <p class="mb-0">&copy; 2023 StyleJackets. Todos los derechos reservados.</p>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>