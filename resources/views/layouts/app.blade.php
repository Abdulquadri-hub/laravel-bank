    @include("layouts.header")
    
    <div class="container-scroller">

      <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        @include("layouts.nav")
      </nav>


      <div class="container-fluid page-body-wrapper">

        <nav class="sidebar sidebar-offcanvas" id="sidebar">
          @include("layouts.sidebar")
        </nav>
        

        <div class="main-panel">
          @include("layouts.message")
          <div class="content-wrapper">
            @yield("content")
          </div>

          <footer class="footer">
            @include("layouts.footer")
          </footer>

        </div>

      </div>
      
    </div>
  </body>
</html>