import { createRouter, createWebHistory } from 'vue-router';

const router = createRouter({
  history: createWebHistory(),
  routes: [
    {
      path: '/',
      name: 'welcome',
      component: () => import('../screens/Welcome/Welcome.vue'),
    },
    {
      path: '/json-viewer',
      name: 'json-viewer',
      component: () => import('../screens/JsonViewer/JsonViewer.vue'),
    },
  ],
});

export default router;
