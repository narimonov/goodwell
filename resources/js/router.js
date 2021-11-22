import VueRouter from 'vue-router';
import Vue from 'vue';

Vue.use(VueRouter);

import Index from "./views/Index"
import Blog from "./views/Blog"
import Category from "./views/Category"

const routes = [
  {
    path: '/',
    component:Index,
  },
  {
    path: '/blog/:id',
    component:Blog
  },
  {
    path: '/:category_id',
    component:Category
  },
];

export default new VueRouter({
  mode:'history',
  routes
})
