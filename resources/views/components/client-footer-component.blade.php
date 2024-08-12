  <footer class="footer text-center">
      <script async="" src="gtag/js?id=UA-111601529-1"></script>
      <script>
          window.dataLayer = window.dataLayer || [];

          function gtag() {
              dataLayer.push(arguments);
          }
          gtag('js', new Date());

          gtag('config', 'UA-111601529-1');
      </script>
      <div class="top-footer">
          <div class="container">
              <div class="row">
                  <div class="col-xs-12">
                      <ul class="footer-social">
                          <li class="main-color">
                              <a href="{{ServiceFacade::getData()->facebook_link}}" target="_blank" class="main-color-bg effect"><i class="fa fa-facebook"></i></a>
                          </li>

                          <li class="main-color">
                              <a href="{{ServiceFacade::getData()->linkedin_link}}" target="_blank" class="main-color-bg effect"><i class="fa fa-linkedin"></i></a>
                          </li>
                      </ul>
                  </div>
                  <div class="col-xs-12">
                      <ul class="footer-nav">
                          @foreach($links as $link)
                              @if($link->code != "work" and $link->code != "blog")
                                  <li><a href="{{$link->slug}}">{{$link->title}}</a></li>

                              @endif
                          @endforeach
                      </ul>
                  </div>
              </div>
          </div>
          <a href="#home" class="scroll-btn top-btn main-color-bg effect"><i class="fa fa-angle-up"></i></a>
      </div>
      <div class="bottom-footer main-color-bg">
          <div class="container">
              <div class="row">
                  <div class="col-xs-12">
                      <p>
                          {{ServiceFacade::getData()->copyright_text}}
                      </p>
                  </div>
              </div>
          </div>
      </div>
  </footer>
