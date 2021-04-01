@extends('master.layout')

@section('conteudo')
    <!-- ======= Hero Section ======= -->
  <section id="hero">
    <div class="hero-container">
      <br> <br> <br>
      <h3>Seja Bem-vindo ao <strong>Verdant</strong></h3>
    </div>
  </section><!-- End Hero -->
  <main id="main">

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container">

        <div class="section-title">
          <h2 class="mb-3 mt-3">Sobre nós</h2>
          <p>Somos uma organização jovem que presta serviços de parqueamento de viaturas ligeiras e pesadas.</p>
        </div>

        <div class="row content">
          <div class="col-lg-6">
            <p>
             Oferecemos para si e para sua viatura diversos benefícios
            </p>
            <ul>
              <li><i class="ri-check-double-line"></i> Segurança 24h por dia</li>
              <li><i class="ri-check-double-line"></i> Equipamentos contra incêndios</li>
              <li><i class="ri-check-double-line"></i> Vigilância electrónica 24h por dia</li>
            </ul>
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0">
            <p>
              Contamos com infra-estrutura segura, com profissionais qualificados, tecnologia de ponta,
              condições excelentes, tudo para garantir a segurança da sua viatura.
            </p>
            <a href="#" class="btn-learn-more">Saiba mais</a>
          </div>
        </div>

      </div>
    </section><!-- End About Section -->
    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container">

        <div class="section-title">
          <h2 class="mb-3 mt-4">Contacte-nos</h2>
          <p>Venha até nós e deixa a sua viatura em excelentes mãos, ou melhor, em excelentes paredes e portões.</p>
        </div>

        <div>
          <iframe style="border:0; width: 100%; height: 300px;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3589.7106262794964!2d32.580856014704885!3d-25.87899980711513!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1ee6910cc597197d%3A0x9416b9c5a117d05e!2sPalvic.lda!5e0!3m2!1spt-PT!2smz!4v1616658645784!5m2!1spt-PT!2smz" frameborder="0" allowfullscreen></iframe>
        </div>

        <div class="row mt-5">

          <div class="col-lg-4">
            <div class="info">
              <div class="address">
                <i class="bi bi-geo-alt"></i>
                <h4>Localização:</h4>
                <p>Avenida Maria Lurdes Mutola, Maputo, paragem posto 19</p>
              </div>

              <div class="email">
                <i class="bi bi-envelope"></i>
                <h4>Email:</h4>
                <p>parquedeestacionamento@verdant.com</p>
              </div>

              <div class="phone">
                <i class="bi bi-phone"></i>
                <h4>Contacto:</h4>
                <p>+258 83 901 1111</p>
                <p>+258 84 901 1111</p>
                <p>+258 87 901 1111</p>
              </div>

            </div>

          </div>

          <div class="col-lg-8 mt-5 mt-lg-0">

            <form action="" method="post" role="form" class="php-email-form">
              <div class="row">
                <div class="col-md-6 form-group">
                  <input type="text" name="name" class="form-control" id="name" placeholder="Nome" required>
                </div>
                <div class="col-md-6 form-group mt-3 mt-md-0">
                  <input type="email" class="form-control" name="email" id="email" placeholder="Email" required>
                </div>
              </div>
              <div class="form-group mt-3">
                <input type="text" class="form-control" name="subject" id="subject" placeholder="Assunto" required>
              </div>
              <div class="form-group mt-3">
                <textarea class="form-control" name="message" rows="5" placeholder="Mensagem" required></textarea>
              </div>
              <div class="text-center"><button type="submit">Enviar</button></div>
            </form>

          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->
  </main>
@endsection
