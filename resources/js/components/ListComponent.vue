<template>
  <div class="container">
    <div class="row">
      <SubComponent />
      <div
        v-for="post in postsArray"
        :key="post.id"
        class="card col-md-3"
        style="width: 18rem"
      >
        <img class="card-img-top" :src="post.img_path" alt="Card image cap" />
        <div class="card-body">
          <h5 class="card-title">{{ post.title }}</h5>
          <p class="card-text">{{ post.author }}</p>
          <p class="card-text">{{ post.category }}</p>
          <p class="card-text">Created at: {{ post.created_at }}</p>
          <button
            @click="deleteById(post.id)"
            type="button"
            class="btn btn-danger"
          >
            Delete
          </button>
        </div>
      </div>
    </div>
    <div class="row justify-content-center">
      <nav aria-label="Page navigation example">
        <ul class="pagination">
          <li
            v-for="n in lastPage"
            :key="n"
            class="page-item"
            @click="changePage(n)"
          >
            <a class="page-link" href="#">{{ n }}</a>
          </li>
        </ul>
      </nav>
    </div>
  </div>
</template>

<script>
import SubComponent from "./SubComponent.vue";

export default {
  components: {
    SubComponent: SubComponent,
  },
  mounted() {
    this.getPosts();
    this.getCategories();
  },
  data() {
    return {
      postsArray: [],
      categoryArray: [],
      currentPage: 1,
      lastPage: 0,
    };
  },
  methods: {
    getPosts() {
      axios.get(`/api/posts?page={$this.currentPage}`).then((response) => {
        this.postsArray = response.data.data;
        this.lastPage = response.data.last_page;
      });
    },
    getCategories() {
      axios.get("/api/categories").then((response) => {
        this.categoryArray = response.data;
        // console.log(response);
      });
    },
    deleteById(id) {
      axios.delete(`/api/posts/${id}`).then((response) => {
        console.log(response);
        this.getPosts();
      });
    },
    changePage(nPage) {
      this.currentPage = nPage;
      this.getPosts;
    },
  },
};
</script>