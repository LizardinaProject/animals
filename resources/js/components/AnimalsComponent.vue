<template>
    <div class="top_panel">
        <div class="add_button" @click="show_animals_kind()">
            <div class="plus">+</div>
        </div>
        <div class="tabs">
            <div class="animal_icon" v-for="startAnimal in startAnimals">
                <img :src="startAnimal.icon" @click="create_new_animal(startAnimal.id)">
            </div>
        </div>
        <div class="main_window" >
            <div class="main_animals" v-for="createdAnimal in createdAnimals">
            <img 
                :src="createdAnimal.kind_info.picture" 
                :height="createdAnimal.size"
                :weight="createdAnimal.size"
                @click="show_current_animal(createdAnimal.name)"
            >
                <div class="animal_name">{{ createdAnimal.name }}</div>
            </div>
        </div>
        <div class="errors" v-if="errors">{{ errors }}</div>
    </div>
</template>

<script>
    const axios = require('axios').default;
    export default {
        data: () => ({
            startAnimals: {},
            createdAnimals: {},
            errors: '',
            interval: null
        }),
        methods: {
           show_animals_kind(){
                axios.get( "/api/animal_kinds", {
                }).then((response) => {
                    if(response.data.status){
                        this.startAnimals = response.data.data; 
                    }else{
                        this.errors = data.errors;
                    }
                });
           },
           create_new_animal(kind_id){
                axios.post( "/api/create", {
                    kind_id: kind_id
                }).then( (response) => {
                    if(response.data.status){
                        this.createdAnimals = response.data.data; 
                    }
                });
            },
            show_current_animal(animal_name){
                axios.get( "/api/show/?name="+animal_name, {
                }).then( (response) => {
                   console.log(response);
                });
            },
            change_animals(){
                axios.post( "/api/update", {
                }).then( (response) => {
                    if(response.data.status){
                        this.createdAnimals = response.data.data; 
                    }
                });
            },
            all_animals(){
                axios.get( "/api/list", {
                }).then((response) => {
                    if(response.data.status){
                        this.createdAnimals = response.data.data; 
                    }else{
                        this.errors = data.errors;
                    }
                });
            }
        },
        created: function(){
            this.all_animals();
        }, 
        mounted() {
            try {
                this.interval = setInterval(this.change_animals, 5000);
            } catch(e) {
                clearInterval(this.interval);
            }
        }
    }
</script>

<style scoped>
.top_panel{
    display: flex;
}
.add_button{
    width: 48px;
    height: 48px;
    left: 0px;
    top: 0px;
    background: #3E2723;
    border-radius: 100px;
}
.tabs{
    width: 236px;
    height: 48px;
    left: 70px;
    top: 50px;
    background: #D7CCC8;
    border-radius: 0px 8px 8px 0px;
    display: flex;
    padding: 0 10px;
    flex-wrap: wrap;
    flex-direction: column;
}
.main_window{
    display: flex;
    margin-top: 326px;
    flex-direction: row;
    gap: 50px;
}
.plus{
    color: white;
    margin: 8px 19px 0px 15px;
    font-size: 28px;
}
.animal_name{
    margin: 12px 0px 0px 53px
}
</style>