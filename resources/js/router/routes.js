const routes = [
  {
    path: '/home',
    component: () => import('../views/Home.vue'),
    name: 'home'
  },
  {
    path: '/gallery',
    component: () => import('../views/Gallery.vue'),
    name: 'gallery'
  }
]

export default routes;