<template>
    <section class="container">
        <h1>Category</h1>
        <section class="container alert alert-danger col-md-6" v-if="alert !== '' ">{{ alert }}</section>
        <section>
            <router-link :to = "{ name: 'StoreCategory' }" class="btn btn-outline-success" style= "margin:5px">Add category</router-link>
        </section>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Rank</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(cate,index) in categories" :key="index">
                    <td>{{ cate.id }}</td>
                    <td>
                        <router-link :to="{ name:'Showcategory', params: { id:cate.id }}">
                            {{ cate.categoryName }}
                        </router-link>
                    </td>
                    <td>{{ cate.categoryRank }}</td>
                    <td>
                        <router-link :to="{ name:'UpdateCategory', params:{ id:cate.id }}" class="btn btn-outline-info">
                            Edit
                        </router-link>
                        <button class="btn btn-outline-danger" @click=deleteCategory(cate.id)>Delete</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </section>
</template>

<script>
export default {
    data() {
        return{
            categories:[],
            alert:''
        }
    },
    created:function() {
        this.showCategory();
    },
    methods: {
        showCategory() {
            this.axios.get('/category')
            .then((res) => {this.categories = res.data})
            .catch((error) => {this.alert = error});
        },
        deleteCategory(id) {
            if(confirm('Are you sure?')) {
                this.axios.detete('/category/'+id)
                .then((res) =>{this.categories = res.data.categorires;
                this.alert=res.data.alert})
            }
        }
    }
}
</script>
