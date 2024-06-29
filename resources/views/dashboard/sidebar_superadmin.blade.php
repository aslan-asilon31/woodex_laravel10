<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        
      <img src="{{ asset('frontend/assets/img/favicon.png') }}" alt="img Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Lumina</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
            <img src="{{ optional(auth()->user())->image ? auth()->user()->image : asset('avatar-3d/man4.png') }}" alt="img Logo" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
            {{-- <a href="#" class="d-block"> {{ auth()->user()->name ? auth()->user()->name : '@name' }} </a> --}}
            <a href="#" class="d-block"> 
              @auth
                  {{ auth()->user()->name }}
              @endauth
           </a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-tachometer-alt"></i>
              <p>
                Dashboard
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="dashboard.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dashboard Analytic</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="advanced-dashboard/dashboard-afrodit/dashboard.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dashboard Afrodit</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="advanced-dashboard/dashboard-athena/index.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dashboard Athena</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="advanced-dashboard/dashboard-kratos/dashboard-2.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dashboard Kratos</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="advanced-dashboard/dashboard-poseidon/.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dashboard Poseidon</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="advanced-dashboard/dashboard-thalia/analytics.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dashboard Thalia</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="advanced-dashboard/dashboard-zelos/widgets.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dashboard Zelos</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="advanced-dashboard/dashboard-zeus/dashboard-zeus.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dashboard Zeus</p>
                </a>
              </li>

            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-book"></i>
              <p>
                Catalog
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Products</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../categories.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Categories</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../manufactures.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Manufacturers</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../product_reviews.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Product Reviews</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../product_tags.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Product Tags</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>
                    Attributes
                    <i class="fas fa-angle-left right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="../attributes/product_attributes.html" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Product Attributes</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="../attributes/specification_attributes.html" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Spesification Attributes</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="../attributes/checkout_attributes.html" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Checkout Attributes</p>
                    </a>
                  </li>
                </ul>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Sales
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="../sales/order.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Orders</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../sales/shipments.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Shipments</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../sales/return_requests.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Return Requests</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../sales/requrring_payments.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Recurring Payments</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../sales/gift_cards.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Gift Cards</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../sales/shopping_cart_wishlist.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Shopping Carts and Wishlist</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Customers
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="../customers/customers.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Customers</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../customers/customer_roles.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Customer Roles</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../customers/online_customers.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Online Customers</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../customers/vendores.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Vendors</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../customers/activity_log.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Activity Log</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../customers/activity_type.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Activity Type</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../customers/gdpr_request_log.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>GDPR Requests (log) </p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Promotions
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="../promotions/discounts.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Discounts</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../promotions/affiliates.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Affiliates</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../promotions/newsletter_subscriber.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Newsletter Subscribers</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../promotions/campaigns.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Campaigns</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../promotions/activity_log.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Activity Log</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Content Management
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="../content_management/topic_pages.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Topics (Pages)</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../content_management/message_templates.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Message Templates</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../content_management/news_items.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>News Items</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../content_management/news_comments.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>News Comments</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../content_management/blog_posts.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Blog Posts</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../content_management/blog_commens.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Blog Comments</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../content_management/polls.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Polls </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../content_management/forums.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Forums </p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-book"></i>
              <p>
                Configuration
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>
                    Settings
                    <i class="fas fa-angle-left right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="../configuration/settings/general_settings.html" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>General Settings</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="../configuration/settings/customer_settings.html" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Customer Settings</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="../configuration/settings/order_settings.html" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Order Settings</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="../configuration/settings/shipping_settings.html" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Shipping Settings</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="../configuration/settings/tax_settings.html" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Tax Settings</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="../configuration/settings/catalog_settings.html" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Catalog Settings</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="../configuration/settings/shopping_settings.html" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Shopping Cart Settings</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="../configuration/settings/reward_settings.html" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Reward Points</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="../configuration/settings/gdpr_settings.html" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>GDPR Settings</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="../configuration/settings/vendor_settings.html" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Vendor Settings</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="../configuration/settings/blog_settings.html" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Blog Settings</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="../configuration/settings/news_settings.html" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>News Settings</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="../configuration/settings/forum_settings.html" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Forum Settings</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="../configuration/settings/media_settings.html" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Media Settings</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="../configuration/settings/all_settings_advances.html" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>All Settings (Advances)</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="../configuration/email_account.html" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Email Accounts</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="../configuration/stores.html" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Stores</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="../configuration/countries.html" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Countries</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="../configuration/languages.html" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Languages</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="../configuration/currencies.html" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Currencies</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="../configuration/payment_methods.html" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Payment Methods</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="../configuration/payment_restrictions.html" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Payment Restrictions</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="../configuration/tax_providers.html" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Tax Providers</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="../configuration/tax_categories.html" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Tax Categories</p>
                    </a>
                  </li>
                  

                  <li class="nav-item">
                    <a href="#" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>
                        Shipping
                        <i class="fas fa-angle-left right"></i>
                      </p>
                    </a>
                    <ul class="nav nav-treeview">
                      <li class="nav-item">
                        <a href="../configuration/shippings/shipping_providers.html" class="nav-link">
                          <i class="far fa-circle nav-icon"></i>
                          <p>Shipping Providers</p>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="../configuration/shippings/warehouses.html" class="nav-link">
                          <i class="far fa-circle nav-icon"></i>
                          <p>Warehouses</p>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="../configuration/shippings/pickup_points.html" class="nav-link">
                          <i class="far fa-circle nav-icon"></i>
                          <p>Pickup Points</p>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="../configuration/shippings/dates_ranges.html" class="nav-link">
                          <i class="far fa-circle nav-icon"></i>
                          <p>Dates and Ranges</p>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="../configuration/shippings/measures.html" class="nav-link">
                          <i class="far fa-circle nav-icon"></i>
                          <p>Measures</p>
                        </a>
                      </li>
                    </ul>
                  </li>
                  <li class="nav-item">
                    <a href="#" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>
                        POS
                        <i class="fas fa-angle-left right"></i>
                      </p>
                    </a>
                    <ul class="nav nav-treeview">
                      <li class="nav-item">
                        <a href="../configuration/pos/paypal_zettle.html" class="nav-link">
                          <i class="far fa-circle nav-icon"></i>
                          <p>PayPal Zettle</p>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="../configuration/shippings/access_control_list.html" class="nav-link">
                          <i class="far fa-circle nav-icon"></i>
                          <p>Accesss control list</p>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="../configuration/shippings/widgets.html" class="nav-link">
                          <i class="far fa-circle nav-icon"></i>
                          <p>Widgets</p>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="#" class="nav-link">
                          <i class="far fa-circle nav-icon"></i>
                          <p>
                            Authentication
                            <i class="fas fa-angle-left right"></i>
                          </p>
                        </a>
                        <ul class="nav nav-treeview">
                          <li class="nav-item">
                            <a href="../configuration/authentication/external_authentication.html" class="nav-link">
                              <i class="far fa-circle nav-icon"></i>
                              <p>External Authentication</p>
                            </a>
                          </li>
                          <li class="nav-item">
                            <a href="../configuration/authentication/multi_factor_authentication.html" class="nav-link">
                              <i class="far fa-circle nav-icon"></i>
                              <p>Multi-factor Authentication</p>
                            </a>
                          </li>
                          
                        </ul>
                      </li>
                      <li class="nav-item">
                        <a href="pages/examples/login.html" class="nav-link">
                          <i class="far fa-circle nav-icon"></i>
                          <p>Web API</p>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="pages/examples/login.html" class="nav-link">
                          <i class="far fa-circle nav-icon"></i>
                          <p>Local Plugins</p>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="pages/examples/login.html" class="nav-link">
                          <i class="far fa-circle nav-icon"></i>
                          <p>All Plugins and Themes</p>
                        </a>
                      </li>
                    </ul>
                  </li>

                </ul>
              </li>
              <li class="nav-item">
                <a href="pages/examples/lockscreen.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Products</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/examples/lockscreen.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Categories</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/examples/lockscreen.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Manufacturers</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/examples/lockscreen.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Product Reviews</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/examples/lockscreen.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Product Tags</p>
                </a>
              </li>

            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-book"></i>
              <p>
                System
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="pages/examples/lockscreen.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>System Informastion</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/examples/lockscreen.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Log</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/examples/lockscreen.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Warnings</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/examples/lockscreen.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Maintenance</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/examples/lockscreen.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Message Queue</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/examples/lockscreen.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Schedule Tasks</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/examples/lockscreen.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Search Engine Friendly Pages Names</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/examples/lockscreen.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Templates</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-book"></i>
              <p>
                Reports
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="pages/examples/lockscreen.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Sales Summary</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/examples/lockscreen.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Low Stock</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/examples/lockscreen.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Bestsellers</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/examples/lockscreen.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Product never purchased</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/examples/lockscreen.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Country Sales</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>
                    Customer Reports
                    <i class="fas fa-angle-left right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="pages/examples/login.html" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Registered Customer</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="pages/examples/register.html" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Customerby order total</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="pages/examples/forgot-password.html" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Customer by number of order</p>
                    </a>
                  </li>
                </ul>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-book"></i>
              <p>
                Help
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="pages/examples/lockscreen.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Training</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/examples/lockscreen.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Documentation</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/examples/lockscreen.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Community Forums</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/examples/lockscreen.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Premium Support Services</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/examples/lockscreen.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Solution Partners</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="/" class="nav-link">
              <i class="nav-icon fa fa-sign-out-alt"></i>
              <p>
                Sign Out
              </p>
            </a>
          </li>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>