const data=function data()
{
    return {
    type_switcher: '',
     name: '',
     price: '',
     size: '',
     weight: '',
     height: '',
     width: '',
     length: ''
     }
}

const methods=function handleClick()
{
    window.location.href = 'show-product.php';
}

const app={data,methods};
Vue.createApp(app).mount('#app');