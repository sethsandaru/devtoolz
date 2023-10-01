import { createRouter, createWebHistory } from 'vue-router';

export const routes = [
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
];

const router = createRouter({
  history: createWebHistory(),
  routes,
});

export default router;
