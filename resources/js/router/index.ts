import { createRouter, createWebHistory } from 'vue-router';

const ComingSoonPage = () => import('../screens/ComingSoon/ComingSoon.vue');

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
  {
    path: '/identifiers',
    name: 'identifiers',
    component: () => import('../screens/RandomIds/RandomIds.vue'),
  },
  {
    path: '/encryptor',
    name: 'encryptor',
    component: () => import('../screens/Encryptor/Encryptor.vue'),
  },
  {
    path: '/info-generator',
    name: 'info-generator',
    component: () => import('../screens/InfoGenerator/InfoGenerator.vue'),
  },
  {
    path: '/csv-to-json',
    name: 'csv-to-json',
    component: ComingSoonPage,
  },
  {
    path: '/json-to-csv',
    name: 'json-to-csv',
    component: ComingSoonPage,
  },
  {
    path: '/html-to-pdf',
    name: 'html-to-pdf',
    component: ComingSoonPage,
  },
  {
    path: '/rem-and-px',
    name: 'rem-and-px',
    component: () => import('../screens/RemPx/RemPx.vue'),
  },
];

const router = createRouter({
  history: createWebHistory(),
  routes,
});

export default router;
