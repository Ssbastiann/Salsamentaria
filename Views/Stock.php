<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Inventario</title>
  <link rel="stylesheet" href="../CSS/styles.css">
</head>
<body>

  <header>
    <div>
      <nav>
        <a href="#">Panel</a>
        <a href="#">Ventas</a>
        <a href="#">Inventario</a>
      </nav>
    </div>
    <div class="topbar">
      <button id="openModalBtn">Agregar producto</button>
      <span>👤</span>
    </div>
  </header>

  <h1>Inventario</h1>

  <div class="search-filter">
    <input type="text" id="busqueda" placeholder="Buscar productos" onkeyup="filtrarProductos()" />
    <button onclick="filtrarProductos()">Filtrar</button>
  </div>

  <div class="product-grid" id="productGrid">
    <!-- Productos existentes -->
    <div class="product-card">
      <img src="https://www.demoslavueltaaldia.com/sites/default/files/2018/Jun/salchichas_a_la_plancha.jpg" alt="Salchichas cocidas">
      <div>
        <h2>Salchichas cocidas</h2>
        <p>120 en stock</p>
      </div>
    </div>
    <div class="product-card">
      <img src="https://upload.wikimedia.org/wikipedia/commons/1/18/Salami_aka.jpg" alt="Salami">
      <div>
        <h2>Salami</h2>
        <p>85 en stock</p>
      </div>
    </div>
    <div class="product-card">
      <img src="https://megatiendas.vtexassets.com/arquivos/ids/168310-800-450?v=638494087486870000&width=800&height=450&aspect=true" alt="Carne de cerdo: costilla">
      <div>
        <h2>Carne de cerdo: costilla</h2>
        <p>11 en stock</p>
      </div>
    </div>
    <div class="product-card">
      <img src="https://ingredienta.com/wp-content/uploads/2020/07/molida-rauda.jpg" alt="Carne de res: molida">
      <div>
        <h2>Carne de res: molida</h2>
        <p>15 en stock</p>
      </div>
    </div>
    <div class="product-card">
      <img src="https://food.geant.com.uy/arquivos/ids/227303-300-300/301192.jpg?v=636822291178930000" alt="pollo">
      <div>
        <h2>pollo</h2>
        <p>5 en stock</p>
      </div>
    </div>
    <div class="product-card">
      <img src="https://vincentsmeatmarket.com/wp-content/uploads/2018/04/shutterstock_51882826.jpg" alt="Soppressata">
      <div>
        <h2>Soppressata</h2>
        <p>60 en stock</p>
      </div>
    </div>
    <div class="product-card">
      <img src="https://img.freepik.com/foto-gratis/vista-cercana-delicioso-concepto-salami_23-2148738961.jpg?semt=ais_hybrid&w=740" alt="Salami redondo">
      <div>
        <h2>Salami redondo</h2>
        <p>78 en stock</p>
      </div>
    </div>
    <div class="product-card">
      <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR_b4xoF6M1MMudIi7s9ya0_E1oaBBTMZuS3g&s" alt="Jamón">
      <div>
        <h2>Jamón</h2>
        <p>150 en stock</p>
      </div>
    </div>
    <div class="product-card">
      <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQC_zhrUuJP1u1syhlebcDfk8wxwHmIzlv_WA&s" alt="Salchichón">
      <div>
        <h2>Salchichón</h2>
        <p>95 en stock</p>
      </div>
    </div>
    <div class="product-card">
      <img src="https://www.lacasadelqueso.com.ar/wp-content/uploads/2017/08/queso-mozzarella.jpg" alt="queso mozarella">
      <div>
        <h2>queso mozarella</h2>
        <p>100 en stock</p>
      </div>
    </div>
    <div class="product-card">
      <img src="https://villavoexpress.com/rails/active_storage/representations/proxy/eyJfcmFpbHMiOnsiZGF0YSI6OTk2MDYsInB1ciI6ImJsb2JfaWQifX0=--644e4b6fa5c0ce1b896e1e47a5cc60385ef6522c/eyJfcmFpbHMiOnsiZGF0YSI6eyJmb3JtYXQiOiJqcGciLCJyZXNpemVfdG9fZml0IjpbODAwLDgwMF19LCJwdXIiOiJ2YXJpYXRpb24ifX0=--1420d7fd3d20057726f0ef3c0043db24ca0403be/queso-costeno-precio-por-lb.jpg?locale=es" alt="queso costeño">
      <div>
        <h2>queso costeño</h2>
        <p>20 en stock</p>
      </div>
    </div>
    <div class="product-card">
      <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSOPL54VJgjPnOJ5j5iwaaw4-V6bj5jSVP7oEVAeFPgnT7D189u347c6yjH38mEYgmBAfw&usqp=CAU" alt="queso campesino">
      <div>
        <h2>queso campesino</h2>
        <p>100 en stock</p>
      </div>
    </div>
      <div class="product-card">
        <img src="https://www.cocinaygastronomia.com/wp-content/uploads/2011/06/bufala.jpg" alt="Queso cocido de búfala">
        <div>
          <h2>Queso cocido de búfala</h2>
          <p>100 en stock</p>
        </div>
      </div>
      <div class="product-card">
        <img src="https://a.storyblok.com/f/160385/6fcdca44dc/inicio_cronica.jpg" alt="queso asado en piedra del caquetá">
        <div>
          <h2>queso asado en piedra del caquetá</h2>
          <p>10 en stock</p>
        </div>
      </div>
      <div class="product-card">
        <img src="https://elnoti.com/wp-content/uploads/2020/01/bocadillo-con-queso-1280x720.jpg" alt="bocadillo con queso">
        <div>
          <h2>bocadillo con queso</h2>
          <p>50 en stock</p>
        </div>
      </div>
      <div class="product-card">
        <img src="https://elrinconcolombiano.com/wp-content/uploads/2024/03/Cuajada-receta-colombiana.jpg" alt="Cuajada">
        <div>
          <h2>Cuajada</h2>
          <p>60 en stock</p>
        </div>
      </div>
      <div class="product-card">
        <img src="https://misaboracolombia.com/cdn/shop/articles/arequipe4_1200x1200.jpg?v=1607222906" alt="arequipe">
        <div>
          <h2>arequipe</h2>
          <p>30 en stock</p>
        </div>
      </div>
      <div class="product-card">
        <img src="https://i0.wp.com/www.pasionthermomix.co/wp-content/uploads/2022/04/como-hacer-queso-crema-casero-para-cheesecakes-receta.jpg?fit=688%2C459&ssl=1" alt="queso crema">
        <div>
          <h2>queso crema</h2>
          <p>130 en stock</p>
        </div>
      </div>
      <div class="product-card">
        <img src="https://www.odecu.cl/wp-content/uploads/2019/03/leche.jpg" alt="leche">
        <div>
          <h2>leche</h2>
          <p>40 en stock</p>
        </div>
      </div>
      <div class="product-card">
        <img src="https://cuidateplus.marca.com/sites/default/files/styles/natural/public/cms/yogur_1.jpg.webp?itok=huMmX0Du" alt="Yogurt">
        <div>
          <h2>Yogurt</h2>
          <p>30 en stock</p>
        </div>
      </div>
      <div class="product-card">
        <img src="https://tipicojamoneria.com/wp-content/uploads/2021/05/WEBTIPICO-45.jpg" alt="Kumis">
        <div>
          <h2>Kumis</h2>
          <p>20 en stock</p>
        </div>
      </div>
      <div class="product-card">
        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS-B9jYYwir-xo0PVGnPQEYi9Sm_HrAgfUqEg&s" alt="Mantequilla">
        <div>
          <h2>Mantequilla</h2>
          <p>11 en stock</p>
        </div>
      </div>
      <div class="product-card">
        <img src="https://upload.wikimedia.org/wikipedia/commons/c/c5/Smietana.JPG" alt="Crema de leche">
        <div>
          <h2>Crema de leche</h2>
          <p>10 en stock</p>
        </div>
      </div>
      <div class="product-card">
        <img src="https://www.cheeseokay.com/wp-content/uploads/2020/05/huevos-AA.jpg" alt="cubeta de Huevos">
        <div>
          <h2>cubeta de Huevos</h2>
          <p>13 en stock</p>
        </div>
      </div>
      <div class="product-card">
        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRXNLKQpC98LpDlR7HAKYoTiRS-xPWMWbja1Q&s" alt="Pan tajado">
        <div>
          <h2>Pan tajado</h2>
          <p>15 en stock</p>
        </div>
      </div>
      <div class="product-card">
        <img src="https://www.santaelena.com.co/wp-content/uploads/2022/02/articulo-pandebono.webp" alt="Pan de bono">
        <div>
          <h2>Pan de bono</h2>
          <p>20 en stock</p>
        </div>
      </div>
      <div class="product-card">
        <img src="https://e00-xlk-ue-marca.uecdn.es/uploads/2025/03/24/16379337613621.jpeg" alt="galletas">
        <div>
          <h2>galletas</h2>
          <p>30 en stock</p>
        </div>
      </div>
        <div class="product-card">
          <img src="https://static.eldiario.es/clip/628cd2a8-8ee3-416d-b38d-9ee71578f26c_16-9-discover-aspect-ratio_default_0.jpg" alt="Mayonesa">
          <div>
            <h2>Mayonesa</h2>
            <p>7 en stock</p>
          </div>
        </div>
        <div class="product-card">
          <img src="https://convy.mx/cdn/shop/products/70500135_800x.jpg?v=1610400048" alt="Mostaza">
          <div>
            <h2>Mostaza</h2>
            <p>10 en stock</p>
          </div>
        </div>
        <div class="product-card">
          <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ437lY5knakGH3KQFiTUH65lKEeaBsbCOrqw&s" alt="Ketchup">
          <div>
            <h2>Ketchup</h2>
            <p>70 en stock</p>
          </div>
        </div>
        <div class="product-card">
          <img src="https://i0.wp.com/goula.lat/wp-content/uploads/2020/09/salsas-y-chiles.jpg?fit=1000%2C667&ssl=1" alt="Salsa picante">
          <div>
            <h2>Salsa picante</h2>
            <p>60 en stock</p>
          </div>
        </div>
        <div class="product-card">
          <img src="https://es.cravingsjournal.com/wp-content/uploads/2019/11/salsa-bbq-5.jpg" alt="salsa BBQ">
          <div>
            <h2>salsa BBQ</h2>
            <p>30 en stock</p>
          </div>
        </div>
        <div class="product-card">
          <img src="https://instantia.com/wp-content/uploads/2016/08/Ajo-en-polvo-1-4.jpg" alt="Ajo molido">
          <div>
            <h2>Ajo molido</h2>
            <p>20 en stock</p>
          </div>
        </div>
        <div class="product-card">
          <img src="https://m.media-amazon.com/images/I/71u7nPoBRpL.jpg" alt="pasta de ajo">
          <div>
            <h2>pasta de ajo</h2>
            <p>10 en stock</p>
          </div>
        </div>
        <div class="product-card">
          <img src="https://somosnews.com.mx/wp-content/uploads/2025/01/estas-son-las-marcas-de-sal-que-no-tienen-microplasticos-y-son-100-puras-y-confiables.jpg" alt="sal">
          <div>
            <h2>sal</h2>
            <p>110 en stock</p>
          </div>
        </div>
        <div class="product-card">
          <img src="https://blog.aibinternational.com/hubfs/Kali-Mirch-Powder-600x600.jpg" alt="pimienta">
          <div>
            <h2>pimienta</h2>
            <p>120 en stock</p>
          </div>
        </div>
        <div class="product-card">
          <img src="https://phantom-marca.unidadeditorial.es/ef9aaf34a427f44a81dea992c7f9364f/resize/828/f/jpg/assets/multimedia/imagenes/2023/05/29/16853720925165.jpg" alt="atún">
          <div>
            <h2>atún</h2>
            <p>80 en stock</p>
          </div>
        </div>
        <div class="product-card">
          <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR9m7BIb5FZY7vrj2KGDroFCOPwOA6Z1ME1OA&s" alt="sardinas">
          <div>
            <h2>sardinas</h2>
            <p>90 en stock</p>
          </div>
        </div>
        <div class="product-card">
          <img src="https://c.files.bbci.co.uk/15978/production/_106404488_gettyimages-479378746.jpg" alt="Aceite">
          <div>
            <h2>Aceite</h2>
            <p>70 en stock</p>
          </div>
        </div>
        <div class="product-card">
          <img src="https://http2.mlstatic.com/D_NQ_NP_912943-MCO44224975551_122020-O.webp" alt="Harina">
          <div>
            <h2>Harina</h2>
            <p>40 en stock</p>
          </div>
        </div>
        <div class="product-card">
          <img src="https://img.freepik.com/fotos-premium/paquete-arroz_488220-9350.jpg" alt="arroz">
          <div>
            <h2>arroz</h2>
            <p>160 en stock</p>
          </div>
        </div>
        <div class="product-card">
          <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTKAAYdPJ_URwJNQ-4CZMFxR6y5rDcgQEUoOA&s" alt="lentejas">
          <div>
            <h2>lentejas</h2>
            <p>150 en stock</p>
          </div>
        </div>
        <div class="product-card">
          <img src="https://cloudfront-us-east-1.images.arcpublishing.com/elespectador/VGSSIYPXKFEPLIRUYV2JDQFSIY.jpg" alt="frijoles">
          <div>
            <h2>frijoles</h2>
            <p>100 en stock</p>
          </div>
        </div>
        <div class="product-card">
          <img src="https://i.blogs.es/6ccee6/azucar-blanco/450_1000.jpg" alt="Azúcar">
          <div>
            <h2>Azúcar</h2>
            <p>200 en stock</p>
          </div>
  </div>

  <!-- Modal para agregar productos -->
  <div class="modal" id="modal">
    <div class="modal-content">
      <h3>Agregar nuevo producto</h3>
      <input type="text" id="nombreProducto" placeholder="Nombre del producto" />
      <input type="text" id="imagenProducto" placeholder="URL de la imagen" />
      <input type="number" id="stockProducto" placeholder="Cantidad en stock" />
      <button onclick="agregarProducto()">Agregar</button>
      <button onclick="cerrarModal()">Cancelar</button>
    </div>
  </div>

  <script>
    const modal = document.getElementById('modal');
    const openModalBtn = document.getElementById('openModalBtn');

    openModalBtn.addEventListener('click', () => {
      modal.style.display = 'flex';
    });

    function cerrarModal() {
      modal.style.display = 'none';
      document.getElementById('nombreProducto').value = '';
      document.getElementById('imagenProducto').value = '';
      document.getElementById('stockProducto').value = '';
    }

    function agregarProducto() {
      const nombre = document.getElementById('nombreProducto').value;
      const imagen = document.getElementById('imagenProducto').value;
      const stock = document.getElementById('stockProducto').value;

      if (nombre && imagen && stock) {
        const grid = document.getElementById('productGrid');
        const card = document.createElement('div');
        card.className = 'product-card';
        card.innerHTML = `
          <img src="${imagen}" alt="${nombre}">
          <div>
            <h2>${nombre}</h2>
            <p>${stock} en stock</p>
          </div>
        `;
        grid.appendChild(card);
        cerrarModal();
      } else {
        alert('Por favor, complete todos los campos.');
      }
    }

    function filtrarProductos() {
      const filtro = document.getElementById('busqueda').value.toLowerCase();
      const cards = document.querySelectorAll('.product-card');

      cards.forEach(card => {
        const nombre = card.querySelector('h2').innerText.toLowerCase();
        card.style.display = nombre.includes(filtro) ? 'block' : 'none';
      });
    }
  </script>
</body>
</html>
