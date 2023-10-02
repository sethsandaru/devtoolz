export const rescue = (
  handler: () => void,
  errorHandler?: (e: unknown) => void
) => {
  try {
    handler();
  } catch (e) {
    errorHandler?.(e);
  }
};
