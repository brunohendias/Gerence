const key = 'dihaiiawdi'

const set = token => localStorage.setItem(key, token);

const get = () => `Bearer ${localStorage.getItem(key)}`;

export { get, set }