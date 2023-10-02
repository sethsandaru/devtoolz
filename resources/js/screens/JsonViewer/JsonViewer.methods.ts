import { JsonViewerRecord } from './JsonViewer.types';

const STORAGE_KEY = 'DEVTOOLZ-JSON-VIEWER';

export const getAllFromStorage = (): JsonViewerRecord[] => {
  const data = localStorage.getItem(STORAGE_KEY);
  if (!data) {
    return [];
  }

  return JSON.parse(data) as JsonViewerRecord[];
};
