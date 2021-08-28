<template>
    <header class="page-topbar" id="header">
        <div class="navbar navbar-fixed">
            <nav class="navbar-main navbar-color nav-collapsible sideNav-lock navbar-dark gradient-45deg-light-blue-cyan">
                <div class="nav-wrapper">
                    <ul class="left">
                        <li>
                            <h1><router-link :to="{name: 'products.index'}" class="brand-logo darken-1" ><span>Test Coding</span></router-link></h1>
                        </li>
                    </ul>
                    <ul class="navbar-list right">
                        <li><router-link class="waves-effect waves-block waves-light notification-button" :to="{name: 'orders.cart'}" ><i class="material-icons">shopping_cart<small class="notification-badge orange accent-3">{{ this.$store.state.cart.length}}</small></i></router-link></li>
                        <li><a title="login" class="waves-effect waves-block waves-light notification-button" href="admin/login"><i class="material-icons">keyboard_tab</i></a></li>
                    </ul>
                </div>
            </nav>
        </div>
    </header>
</template>

<script>
export default {
    name: 'HeaderNav'
}
</script>
