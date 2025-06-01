
  <div class="page-heading header-text">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <h3>Contact Us</h3>
          <span class="breadcrumb"><a href="index.php">Home</a>  >  Contact Us</span>
        </div>
      </div>
    </div>
  </div>

  <div class="contact-page section">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 align-self-center">
          <div class="left-text">
            <div class="section-heading">
              <h6>Contáctanos</h6>
            </div>
            <p>Si tienes alguna duda o sugerencia, no dudes en contactarnos.</p>
            <ul>
              <li><span>Dirección</span> Calle del Mar 45, Vélez-Málaga, Málaga 29740, España</li>
              <li><span>Teléfono</span> +34 952 607 321</li>
              <li><span>Correo</span> contacto@malaga.com</li>
            </ul>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="right-content">
            <div class="row">
              <div class="col-lg-12">
                <?php if(isset($_SESSION['ok'])): ?>
                <div class="alert alert-success" role="alert">
                  <?php echo $_SESSION['ok']; unset($_SESSION['ok']); ?>
                </div>
                <?php endif; ?>
                
                <?php if(isset($_SESSION['ko'])): ?>
                <div class="alert alert-danger" role="alert">
                  <?php echo $_SESSION['ko']; unset($_SESSION['ko']); ?>
                </div>
                <?php endif; ?>
              </div>
              <div class="col-lg-12">
                <form id="contact-form" action="enviar_mensaje.php" method="post">
                  <div class="row">
                    <div class="col-lg-6">
                      <fieldset>
                        <input type="text" name="name" id="name" placeholder="Your Name..." required>
                      </fieldset>
                    </div>
                    <div class="col-lg-6">
                      <fieldset>
                        <input type="email" name="email" id="email" placeholder="Your E-mail..." required>
                      </fieldset>
                    </div>
                    <div class="col-lg-6">
                      <fieldset>
                        <input type="text" name="asunto" id="asunto" placeholder="Subject..." required>
                      </fieldset>
                    </div>
                    <div class="col-lg-12">
                      <fieldset>
                        <textarea name="mensaje" id="mensaje" placeholder="Your Message"></textarea>
                      </fieldset>
                    </div>
                    <div class="col-lg-12">
                      <fieldset>
                        <button type="submit" id="form-submit" class="orange-button">Send Message Now</button>
                      </fieldset>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>  

  <!-- Scripts -->
  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
  <script src="assets/js/isotope.min.js"></script>
  <script src="assets/js/owl-carousel.js"></script>
  <script src="assets/js/counter.js"></script>
  <script src="assets/js/custom.js"></script>

  </body>
</html>