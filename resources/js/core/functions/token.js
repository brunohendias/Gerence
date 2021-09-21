const key = 'dihaiiawdi'

const set = token => localStorage.setItem(key, token);

const get = () => `Bearer ${localStorage.getItem(key)}`;

const remove = () => localStorage.removeItem(key);

export { set, get, remove }