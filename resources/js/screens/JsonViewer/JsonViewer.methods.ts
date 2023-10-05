import { JsonViewerRecord } from './JsonViewer.types';

const STORAGE_KEY = 'DEVTOOLZ-JSON-VIEWER';

export const getAllFromStorage = (): JsonViewerRecord[] => {
  const data = localStorage.getItem(STORAGE_KEY);
  if (!data) {
    return [];
  }

  return JSON.parse(data) as JsonViewerRecord[];
};

export const storeAllToStorage = (records: JsonViewerRecord[]): void => {
  const data = JSON.stringify(records);

  localStorage.setItem(STORAGE_KEY, data);
};
