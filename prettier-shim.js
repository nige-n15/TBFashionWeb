// prettier-shim.js
// Mock implementation of prettier functions
const prettier = {
    format: (code, options) => code,
    formatWithCursor: (code, options) => ({ formatted: code, cursorOffset: 0 }),
    getSupportInfo: () => ({ languages: [] }),
    resolveConfig: () => Promise.resolve({}),
    clearConfigCache: () => {},
    getFileInfo: () => Promise.resolve({ ignored: false, inferredParser: null }),
};

export default prettier;
export const format = prettier.format;
export const formatWithCursor = prettier.formatWithCursor;
export const getSupportInfo = prettier.getSupportInfo;
export const resolveConfig = prettier.resolveConfig;
export const clearConfigCache = prettier.clearConfigCache;
export const getFileInfo = prettier.getFileInfo;
