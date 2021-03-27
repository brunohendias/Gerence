<template>
    <div id="navbar" class="container-fluid mb-3 text-right">
        <div class="row">
            <div class="col-2 pt-2">
                <h4>Gerence</h4>
            </div>
            <div class="col-9 pt-1">
                <div class="dropdown">
                    <span type="button" data-toggle="dropdown" class="btn text-white">
                        <i class="fas fa-user"></i>
                    </span>
                    <ul class="dropdown-menu p-3">
                        <p> 
                            <strong>Usuario: </strong> {{ user.name }} <br>
                            <strong>Email: </strong> {{ user.email }}
                        </p>
                        <p><hr class="dropdown-divider"></p>
                        <p class="text-right">
                            <button @click="logout" class="btn btn-sm btn-danger ml-2">
                                logout
                            </button>
                        </p>
                    </ul>
                </div> 
            </div>
        </div>
    </div>
</template>

<script>
import { show, logout } from '@functions/user'

export default {
    name: 'navbar',
    data() {
        return {
            logout,
            user: {}
        }
    },
    created() {
        this.user = show(this)
    }
}
</script>

<style>
    #navbar {
        height: 40px;
        background-color: #2a2a2e;
        color: white;
    }
    h4 {
        font-weight: 800;
    }
</style>