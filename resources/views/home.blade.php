@extends('layouts.site')

@section('title', 'Buffet Europa — Salão de Festas')

@section('content')
<style>
  :root{
    --bg:#0b0f17;
    --soft:#0f1522;
    --accent:#f6c343;
    --muted:#98a2b3;
    --stroke: rgba(255,255,255,.10);
  }

  .fw-800{ font-weight: 800; }

  .hero{
    position: relative;
    min-height: 92vh;
    display:flex;
    align-items:center;
    padding-top: 86px;
    background-image: url("https://images.unsplash.com/photo-1527529482837-4698179dc6ce?auto=format&fit=crop&w=1600&q=70");
    background-size: cover;
    background-position:center;
  }

  .hero-overlay{
    position:absolute; inset:0;
    background:
      radial-gradient(1200px 500px at 20% 30%, rgba(246,195,67,.22), transparent 60%),
      linear-gradient(180deg, rgba(10,14,22,.65), rgba(10,14,22,.92));
  }

  .hero-content{ position:relative; z-index:1; }

  .chip{
    padding: .5rem .75rem;
    border: 1px solid rgba(255,255,255,.18);
    border-radius: 999px;
    background: rgba(255,255,255,.06);
  }

  .section{ background:#fff; }
  .section-soft{ background:#f6f7fb; }

  .section-dark{
    background:
      radial-gradient(900px 500px at 20% 0%, rgba(246,195,67,.18), transparent 60%),
      linear-gradient(180deg, #0b0f17, #0a0e16);
  }

  .hero-card{
    border-radius: 1.25rem;
  }

  .img-box{
    height: 420px;
    border-radius: 1.25rem;
    background-image: url("https://images.unsplash.com/photo-1519167758481-83f29c9e9d1b?auto=format&fit=crop&w=1400&q=70");
    background-size: cover;
    background-position:center;
    box-shadow: 0 20px 50px rgba(0,0,0,.18);
  }

  .feature-card{
    border: 1px solid #e8edf6;
    background:#fff;
    border-radius: 1rem;
    padding: 1rem;
    box-shadow: 0 10px 30px rgba(15, 23, 42, .06);
  }
  .feature-title{ font-weight: 800; margin-bottom: .25rem; }
  .feature-text{ color:#667085; font-size: .95rem; }

  .service-card{
    border-radius: 1.25rem;
    background:#fff;
    border: 1px solid #e8edf6;
    padding: 1.25rem;
    box-shadow: 0 10px 30px rgba(15, 23, 42, .06);
    height:100%;
  }
  .service-icon{
    width: 48px; height: 48px;
    border-radius: 14px;
    display:flex; align-items:center; justify-content:center;
    background: rgba(246,195,67,.20);
    margin-bottom: .75rem;
    font-size: 22px;
  }
  .service-title{ font-weight:800; margin-bottom:.25rem; }
  .service-text{ color:#667085; }

  .gallery-item{
    height: 220px;
    border-radius: 1.25rem;
    background-size: cover;
    background-position:center;
    box-shadow: 0 14px 40px rgba(0,0,0,.12);
    transition: transform .18s ease, filter .18s ease;
    filter: saturate(1.05);
    cursor:pointer;
  }
  .gallery-item:hover{ transform: translateY(-4px); }

  .contact-card{
    border-radius: 1.25rem;
    border: 1px solid rgba(255,255,255,.10);
    background: rgba(255,255,255,.06);
    padding: 1.25rem;
  }

  .whats-float{
    position: fixed;
    right: 18px;
    bottom: 18px;
    z-index: 9999;
    display: inline-flex;
    align-items: center;
    gap: 10px;
    padding: 12px 14px;
    border-radius: 999px;
    background: #25d366;
    color: #0b0f17;
    text-decoration: none;
    box-shadow: 0 18px 50px rgba(0,0,0,.22);
    font-weight: 800;
  }
  .whats-icon{
    width: 38px; height: 38px;
    border-radius: 999px;
    display:flex; align-items:center; justify-content:center;
    background: rgba(255,255,255,.75);
  }
  .whats-dot{
    width: 10px; height: 10px;
    background: rgba(255,255,255,.85);
    border-radius: 999px;
    box-shadow: 0 0 0 6px rgba(255,255,255,.20);
  }

  @media (max-width: 576px){
    .gallery-item{ height: 160px; }
  }
</style>

<section id="top" class="hero">
  <div class="hero-overlay"></div>

  <div class="container hero-content">
    <div class="row align-items-center g-4">
      <div class="col-lg-7">
        <span class="badge text-bg-warning text-dark fw-semibold px-3 py-2 mb-3">Salão de Festas em Guarulhos</span>
        <h1 class="display-5 fw-800 text-white mb-3">Seu evento com estrutura completa, buffet e decoração</h1>
        <p class="lead text-white-50 mb-4">
          Casamentos, aniversários, debutantes e corporativo. Atendimento rápido no WhatsApp e visita agendada.
        </p>

        <div class="d-flex flex-column flex-sm-row gap-2">
          <a class="btn btn-warning btn-lg fw-semibold" target="_blank"
             href="https://wa.me/5511999999999?text=Olá!%20Quero%20agendar%20uma%20visita.">
            Agendar pelo WhatsApp
          </a>
          <a class="btn btn-outline-light btn-lg" href="#galeria">Ver galeria</a>
        </div>

        <div class="mt-4 d-flex flex-wrap gap-3 small text-white-50">
          <div class="chip">✅ Capacidade até 200 pessoas</div>
          <div class="chip">✅ Espaço kids</div>
          <div class="chip">✅ Estacionamento</div>
        </div>
      </div>

      <div class="col-lg-5">
        <div class="card hero-card border-0 shadow-lg">
          <div class="card-body p-4">
            <div class="h5 fw-bold mb-1">Peça um orçamento</div>
            <div class="text-muted small mb-3">Resposta rápida</div>

            <form class="row g-2" id="formOrcamento">
              <div class="col-12">
                <input class="form-control" name="nome" placeholder="Seu nome">
              </div>
              <div class="col-12">
                <input class="form-control" name="whats" placeholder="WhatsApp">
              </div>
              <div class="col-12">
                <select class="form-select" name="tipo">
                  <option value="">Tipo de evento</option>
                  <option>Aniversário</option>
                  <option>Casamento</option>
                  <option>Corporativo</option>
                  <option>Outros</option>
                </select>
              </div>
              <div class="col-12">
                <textarea class="form-control" rows="3" name="msg" placeholder="Mensagem"></textarea>
              </div>
              <div class="col-12 d-grid">
                <button type="button" class="btn btn-dark btn-lg fw-semibold" id="btnOrcamento">
                  Enviar no WhatsApp
                </button>
              </div>
              <div class="col-12">
                <div class="small text-muted">Ao clicar, abrimos o WhatsApp com a mensagem pronta.</div>
              </div>
            </form>

          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<section id="sobre" class="py-5 section">
  <div class="container">
    <div class="row g-4 align-items-center">
      <div class="col-lg-6">
        <div class="img-box"></div>
      </div>
      <div class="col-lg-6">
        <h2 class="fw-800 mb-3">Sobre o espaço</h2>
        <p class="text-muted">
          Um salão completo para seu evento: ambiente climatizado, pista de dança, espaço kids e estrutura para buffet.
        </p>

        <div class="row g-3 mt-1">
          <div class="col-md-6">
            <div class="feature-card">
              <div class="feature-title">Ambiente completo</div>
              <div class="feature-text">Som, iluminação e decoração.</div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="feature-card">
              <div class="feature-title">Equipe experiente</div>
              <div class="feature-text">Organização do início ao fim.</div>
            </div>
          </div>
        </div>

        <div class="mt-4">
          <a class="btn btn-warning fw-semibold" href="#contato">Falar com atendimento</a>
        </div>
      </div>
    </div>
  </div>
</section>

<section id="servicos" class="py-5 section section-soft">
  <div class="container">
    <div class="text-center mb-4">
      <h2 class="fw-800 mb-2">Serviços</h2>
      <p class="text-muted mb-0">O que está incluso para deixar seu evento perfeito.</p>
    </div>

    <div class="row g-3">
      <div class="col-md-6 col-lg-4">
        <div class="service-card">
          <div class="service-icon">🍽️</div>
          <div class="service-title">Buffet completo</div>
          <div class="service-text">Opções de cardápio e bebidas.</div>
        </div>
      </div>
      <div class="col-md-6 col-lg-4">
        <div class="service-card">
          <div class="service-icon">🎉</div>
          <div class="service-title">Decoração</div>
          <div class="service-text">Temática, mesa principal e detalhes.</div>
        </div>
      </div>
      <div class="col-md-6 col-lg-4">
        <div class="service-card">
          <div class="service-icon">🎵</div>
          <div class="service-title">Som e iluminação</div>
          <div class="service-text">Estrutura para pista de dança.</div>
        </div>
      </div>
      <div class="col-md-6 col-lg-4">
        <div class="service-card">
          <div class="service-icon">🧸</div>
          <div class="service-title">Espaço kids</div>
          <div class="service-text">Área para crianças e brinquedos.</div>
        </div>
      </div>
      <div class="col-md-6 col-lg-4">
        <div class="service-card">
          <div class="service-icon">📸</div>
          <div class="service-title">Área instagramável</div>
          <div class="service-text">Cenários para fotos incríveis.</div>
        </div>
      </div>
      <div class="col-md-6 col-lg-4">
        <div class="service-card">
          <div class="service-icon">🚗</div>
          <div class="service-title">Estacionamento</div>
          <div class="service-text">Mais conforto para os convidados.</div>
        </div>
      </div>
    </div>
  </div>
</section>

<section id="galeria" class="py-5 section">
  <div class="container">
    <div class="d-flex align-items-end justify-content-between flex-wrap gap-2 mb-3">
      <div>
        <h2 class="fw-800 mb-1">Galeria</h2>
        <p class="text-muted mb-0">Alguns registros do nosso espaço e eventos.</p>
      </div>
      <a class="btn btn-outline-dark" href="#contato">Quero visitar</a>
    </div>

    <div class="row g-3">
      @for ($i = 1; $i <= 9; $i++)
        <div class="col-6 col-lg-4">
          <div class="gallery-item" role="button"
               data-bs-toggle="modal"
               data-bs-target="#imgModal"
               data-img="https://picsum.photos/1200/800?random={{ $i }}"
               style="background-image:url('https://picsum.photos/800/600?random={{ $i }}')"></div>
        </div>
      @endfor
    </div>
  </div>
</section>

<section id="contato" class="py-5 section section-dark">
  <div class="container">
    <div class="row g-4">
      <div class="col-lg-5">
        <h2 class="fw-800 text-white mb-2">Contato</h2>
        <p class="text-white-50">Agende sua visita e peça orçamento.</p>

        <div class="contact-card">
          <div class="small text-white-50">WhatsApp</div>
          <div class="h5 mb-2 text-white">(11) 99999-9999</div>
          <a class="btn btn-warning fw-semibold w-100" target="_blank"
             href="https://wa.me/5511999999999?text=Olá!%20Quero%20agendar%20uma%20visita.">
            Chamar no WhatsApp
          </a>
        </div>

        <div class="contact-card mt-3">
          <div class="small text-white-50">Endereço</div>
          <div class="text-white">Guarulhos - SP</div>
          <div class="text-white-50 small">Rua Exemplo, 123 — Centro</div>
        </div>
      </div>

      <div class="col-lg-7">
        <div class="ratio ratio-16x9 rounded-4 overflow-hidden shadow-lg">
          <iframe
            src="https://www.google.com/maps?q=Guarulhos%20SP&output=embed"
            loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
      </div>
    </div>
  </div>
</section>

<a class="whats-float" target="_blank"
   href="https://wa.me/5511999999999?text=Olá!%20Quero%20agendar%20uma%20visita.">
  <span class="whats-dot"></span>
  <span class="d-none d-md-inline">WhatsApp</span>
  <span class="whats-icon">✆</span>
</a>

<div class="modal fade" id="imgModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content bg-dark border-0">
      <img id="modalImg" src="" alt="Imagem" class="w-100 rounded">
    </div>
  </div>
</div>

<script>
  (function(){
    const btn = document.getElementById("btnOrcamento");
    if (btn) {
      btn.addEventListener("click", () => {
        const form = document.getElementById("formOrcamento");
        const nome = form.querySelector('[name="nome"]').value || "";
        const whats = form.querySelector('[name="whats"]').value || "";
        const tipo = form.querySelector('[name="tipo"]').value || "";
        const msg  = form.querySelector('[name="msg"]').value || "";

        const text = encodeURIComponent(
          `Olá! Quero um orçamento.\n\nNome: ${nome}\nWhatsApp: ${whats}\nEvento: ${tipo}\nMensagem: ${msg}`
        );

        window.open(`https://wa.me/5511999999999?text=${text}`, "_blank");
      });
    }

    const modal = document.getElementById("imgModal");
    const modalImg = document.getElementById("modalImg");

    if (modal && modalImg) {
      modal.addEventListener("show.bs.modal", (ev) => {
        const trigger = ev.relatedTarget;
        if (!trigger) return;
        const img = trigger.getAttribute("data-img");
        if (img) modalImg.src = img;
      });

      modal.addEventListener("hidden.bs.modal", () => {
        modalImg.src = "";
      });
    }
  })();
</script>
@endsection