'use strict'


let fn = () => {};

fn.meineSache = 12;

console.log();
console.log(fn.meineSache);



const obj = {
    name: 'Anton',
    zugangsdaten: {
        benutzername: 'anton',
        password: '123456'
    }
};

const text = '{"name":"Anton","zugangsdaten":{"benutzername":"anton","password":"123456"}}';

console.log(JSON.stringify(obj));