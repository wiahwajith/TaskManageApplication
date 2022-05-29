
import Swal from "sweetalert2";
import { notification } from 'ant-design-vue';

function showAlert(component) {

    if(!component){
        return;
    }
    let data = component?.$page || null;
    
    if(!data){
        data = component;
    }

    /* access global successMessage prop and display sweet alert if exist */
    if (data.props.flash.successMessage != null) {
        Swal.fire("Success!", data.props.flash.successMessage, "success");
    }

    /* access global errorMessage prop and display sweet alert if exist */
    else if (data.props.flash.errorMessage != null) {
        Swal.fire("Error!", data.props.flash.errorMessage, "error");
    }

    /* access global errorMessage prop and display sweet alert if exist */
    else if (data.props.flash.message != null) {
        Swal.fire("Error!", data.props.flash.message, "error");
    }

    /* access global form request errors and display sweet alert if exist */
    else if (!isEmpty(data.props.errors)) {

        Object.entries(data.props.errors).forEach(item => {
            Swal.fire("Error!", item[1], "error");
        });
    }
}

function showNotify(page,show_single = 0) {

    const data = page?.props?.flash || {};

    /* successMessage */
    if (data?.successMessage != null) {
 
        notification.success({ message: 'Success !', description: data.successMessage, class: 'success' });
    }

    /* errorMessage  */
    else if (data?.errorMessage != null) {
        notification.error({ message: 'Error !', description: data.errorMessage, class: 'error' });
    }

    /* common msg */
    else if (data?.message != null) {
        notification.info({ message: 'Error !', description: data.errorMessage,});
    }

    /* form request errors  */
    else if (!isEmpty(page?.props?.errors)) {

        Object.entries(page.props.errors).forEach(item => {
            notification.error({ message: 'Error !', description: item[1], class: 'error' });
            if(show_single == 1){
                return;
            }
        });
    }

    
}

function showCommonError(message, title = 'Error!') {
    Swal.fire(title, message, "error");
}

function showCommonSuccess(message, title = "Success!") {
    Swal.fire(title, message, "success");
}

function isEmpty(obj) {
    for (var prop in obj) {
        if (obj.hasOwnProperty(prop))
            return false;
    }

    return true;
}




function formatNumber(number, decimals, decPoint = '.', thousandsSep = ',') {

    number = (number + '').replace(/[^0-9+\-Ee.]/g, '')
    const n = !isFinite(+number) ? 0 : +number
    const prec = !isFinite(+decimals) ? 0 : Math.abs(decimals)
    const sep = (typeof thousandsSep === 'undefined') ? ',' : thousandsSep
    const dec = (typeof decPoint === 'undefined') ? '.' : decPoint
    let s = ''
    const toFixedFix = function (n, prec) {
        if (('' + n).indexOf('e') === -1) {
            return +(Math.round(n + 'e+' + prec) + 'e-' + prec)
        } else {
            const arr = ('' + n).split('e')
            let sig = ''
            if (+arr[1] + prec > 0) {
                sig = '+'
            }
            return (+(Math.round(+arr[0] + 'e' + sig + (+arr[1] + prec)) + 'e-' + prec)).toFixed(prec)
        }
    }
    // @todo: for IE parseFloat(0.55).toFixed(0) = 0;
    s = (prec ? toFixedFix(n, prec).toString() : '' + Math.round(n)).split('.')
    if (s[0].length > 3) {
        s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep)
    }
    if ((s[1] || '').length < prec) {
        s[1] = s[1] || ''
        s[1] += new Array(prec - s[1].length + 1).join('0')
    }
    return s.join(dec)
}

function showAxiosAlert(data) {
    if (data.success) return showCommonSuccess(data.success);
    if (data.error) return showCommonError(data.error);
}

export {
    showAlert,
    showCommonError,
    formatNumber,
    showAxiosAlert,
    showNotify
}
