   <div class="border-right" id="sidebar-wrapper">
       <div class="sidebar-heading text-center">
           <img src="/images/dashboard-store-logo.svg" alt="" class="my-4" />
       </div>
       <div class="list-group list-group-flush">
           <a href="{{ route('dashboard') }}" class="list-group-item list-group-item-action active">Dashboard</a>
           <a href="{{ route('product.index') }}" class="list-group-item list-group-item-action">My Products</a>
           <a href="{{ route('product-galleries.index') }}" class="list-group-item list-group-item-action">Product
               Galleries</a>
           <a href="{{ route('transaction.index') }}" class="list-group-item list-group-item-action">Transactions</a>
           <a href="/dashboard-settings.html" class="list-group-item list-group-item-action">Store Settings</a>
           <a href="/dashboard-account.html" class="list-group-item list-group-item-action">My Account</a>
       </div>
   </div>
