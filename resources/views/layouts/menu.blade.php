      <!-- ============================================================== -->
      <!-- Left Sidebar - style you can find in sidebar.scss  -->
      <!-- ============================================================== -->
      <aside class="left-sidebar" data-sidebarbg="skin5">
          <!-- Sidebar scroll-->
          <div class="scroll-sidebar">
              <!-- Sidebar navigation-->
              <nav class="sidebar-nav">
                  <ul id="sidebarnav" class="pt-4">
                      @can('home')
                          <li class="sidebar-item">
                              <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('home') }}"
                                  aria-expanded="false">
                                  <i class="mdi mdi-view-dashboard"></i>
                                  <span class="hide-menu">Dashboard</span>
                              </a>
                          </li>
                      @endcan
                      @can('home')
                          <li class="sidebar-item">
                              <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('directorios.index') }}"
                                  aria-expanded="false">
                                  <i class="fas fa-university"></i> 
                                  <span class="hide-menu">DIRECTORIOS</span>
                              </a>
                          </li>
                      @endcan
                      @can('asociados.index')
                          <li class="sidebar-item">
                              <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)"
                                  aria-expanded="false">
                                  <i class="fas fa-users"></i>
                                  <span class="hide-menu">Asociados</span>
                              </a>

                              <ul aria-expanded="false" class="collapse first-level">
                                  <li class="sidebar-item">
                                      <a href="/asociados" class="sidebar-link">
                                          <i class="me-2 mdi mdi-account-multiple"></i>
                                          <span class="hide-menu">Listados de miembros</span>
                                      </a>
                                  </li>
                                  @can('asociados.create')
                                      <li class="sidebar-item">
                                          <a href="{{ route('asociados.create') }}" class="sidebar-link">
                                              <i class="me-2 mdi mdi-account-plus"></i>
                                              <span class="hide-menu">Nuevo registro</span>
                                          </a>
                                      </li>
                                  @endcan


                              </ul>

                          </li>

                      @endcan
                      <li class="sidebar-item">
                          <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('web') }}"
                              aria-expanded="false">
                              <i class="fas fa-reply"></i>
                              <span class="hide-menu">Retornar WEB</span>
                          </a>
                      </li>
                      <hr>
                      <div class="container-fluid">
                          <div class="content text-center">
                              <h2 class="h5">Parámetros del Sistema</h2>
                          </div>
                          <li class="sidebar-item">
                              <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)"
                                  aria-expanded="false">
                                  <i class="me-2 mdi mdi-account-key"></i>
                                  <span class="hide-menu">Adm. Usuarios</span>
                              </a>

                              <ul aria-expanded="false" class="collapse first-level">
                                  @can('users.index')
                                      <li class="sidebar-item">
                                          <a href="/users" class="sidebar-link">
                                              <i class="me-2 mdi mdi-account-multiple"></i>
                                              <span class="hide-menu">Usuarios</span>
                                          </a>
                                      </li>
                                  @endcan
                                  @can('roles.index')
                                      <li class="sidebar-item">
                                          <a href="/roles" class="sidebar-link">
                                              <i class="me-2 mdi mdi-account-settings-variant"></i>
                                              <span class="hide-menu">Roles de usuario</span>
                                          </a>
                                      </li>
                                  @endcan
                              </ul>

                          </li>
                          <li class="sidebar-item">
                              <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)"
                                  aria-expanded="false">
                                  <i class="me-2 mdi mdi-clipboard-account"></i>
                                  <span class="hide-menu">Adm. Asociados</span>
                              </a>

                              <ul aria-expanded="false" class="collapse first-level">

                                  @can('parentezcos.index')
                                      <li class="sidebar-item">
                                          <a href="{{ route('parentezcos.index') }}" class="sidebar-link">
                                              <i class="me-2 fas fa-sitemap"></i>
                                              <span class="hide-menu">Parentezcos</span>
                                          </a>
                                      </li>
                                  @endcan
                                  @can('grados.index')
                                      <li class="sidebar-item">
                                          <a href="/grados" class="sidebar-link">
                                              <i class="me-2 fas fa-sort-amount-up"></i>
                                              <span class="hide-menu">Grados de asociados</span>
                                          </a>
                                      </li>
                                  @endcan
                                  @can('estados.index')
                                      <li class="sidebar-item">
                                          <a href="/estados" class="sidebar-link">
                                              <i class="me-2 far fa-list-alt"></i>
                                              <span class="hide-menu">Estado de asociados</span>
                                          </a>
                                      </li>
                                  @endcan
                                  @can('asociados.index')
                                      <li class="sidebar-item">
                                          <a href="{{ route('asociados.deleted') }}" class="sidebar-link">
                                              <i class="me-2 mdi mdi-account-remove"></i>
                                              <span class="hide-menu">Miembros eliminados</span>
                                          </a>
                                      </li>
                                  @endcan
                              </ul>

                          </li>
                      </div>
                  </ul>
              </nav>
              <!-- End Sidebar navigation -->
          </div>
          <!-- End Sidebar scroll-->
      </aside>
      <!-- ============================================================== -->
      <!-- End Left Sidebar - style you can find in sidebar.scss  -->
      <!-- ============================================================== -->
