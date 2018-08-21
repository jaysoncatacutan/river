<template>
    <div class="nav navbar navbar-expand-sm navbar-dark mb-2">
        <div class="container">
            <a href="/river/public" class="navbar-brand">
                <img :src="'../resources/assets/img/logo.svg'" :width=240 :height=38>
            </a>

            <ul class="nav links">
                <li class="mr-2">
                    <a href="/river/public"><h5>HOME</h5></a>
                </li>
                <li class="mr-2">
                    <a href="/river/public/contact"><h5>CONTACT</h5></a>
                </li>
            </ul>
        </div>
    </div>
</template>

<style>
.nav .links{
    color: white;
    text-decoration: none;
}
</style>
