<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href="{{ route('admin.dashboard') }}">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#category-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-menu-button-wide"></i><span>Category</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="category-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{ route('category.index') }}" >
              <i class="bi bi-circle"></i><span>List</span>
            </a>
          </li>
          <li>
            <a href="{{ route('category.create') }}">
              <i class="bi bi-circle"></i><span>Add New</span>
            </a>
          </li>
        </ul>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#product-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-journal-text"></i><span>Food Item</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="product-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{ route('product.index') }}">
              <i class="bi bi-circle"></i><span>List</span>
            </a>
          </li>
          <li>
            <a href="{{ route('product.create') }}">
              <i class="bi bi-circle"></i><span>Add New</span>
            </a>
          </li>
        </ul>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
            <i class="bi bi-people"></i><span>Testimonial</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{ route('testimonial.index') }}">
              <i class="bi bi-circle"></i><span>List</span>
            </a>
          </li>
          <li>
            <a href="{{ route('testimonial.create') }}">
              <i class="bi bi-circle"></i><span>Add New</span>
            </a>
          </li>
        </ul>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#charts-nav" data-bs-toggle="collapse" href="#">
            <i class="bi bi-calendar-event"></i><span>Event</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="charts-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{ route('event.index') }}">
              <i class="bi bi-circle"></i><span>List</span>
            </a>
          </li>
          <li>
            <a href="{{ route('event.create') }}">
              <i class="bi bi-circle"></i><span>Add New</span>
            </a>
          </li>

        </ul>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#icons-nav" data-bs-toggle="collapse" href="#">
            <i class="bi bi-person"></i><span>Chef</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="icons-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{ route('chef.index') }}">
              <i class="bi bi-circle"></i><span>List</span>
            </a>
          </li>
          <li>
            <a href="{{ route('chef.create') }}">
              <i class="bi bi-circle"></i><span>Add New</span>
            </a>
          </li>
        </ul>
      </li><!-- End Icons Nav -->
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#gallery-nav" data-bs-toggle="collapse" href="#">
            <i class="bi bi-images"></i><span>Gallery</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="gallery-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{ route('gallery.index') }}">
              <i class="bi bi-circle"></i><span>List</span>
            </a>
          </li>
          <li>
            <a href="{{ route('gallery.create') }}">
              <i class="bi bi-circle"></i><span>Add New</span>
            </a>
          </li>
        </ul>
      </li><!-- End Icons Nav -->




      <li class="nav-heading">Pages</li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('user.reservationIndex') }}">
          <i class="bi bi-card-list"></i>
          <span>Reservation</span>
        </a>
      </li><!-- End Profile Page Nav --><!-- End F.A.Q Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('user.contactIndex') }}">
          <i class="bi bi-envelope"></i>
          <span>Contact</span>
        </a>
      </li><!-- End Contact Page Nav --><!-- End Blank Page Nav -->

    </ul>

  </aside>
