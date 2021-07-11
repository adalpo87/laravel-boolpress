class FormatDate{

        static format(date){
        let d = new Date(date); //ottengo la data dei post dal api
        let dy = d.getDate(); //gli passo la data e mi restituisce i giorni
        let m = d.getMonth() + 1; //gli passo la data e mi restituisce i mesi da 0 a 11, per questo gli mettiamo +1
        let y = d.getFullYear(); //gli passo la data e mi restituisce l anno per intero
        if (dy < 10) dy = '0'+dy;
        if (m < 10) m = '0'+m;
        return `${dy}/${m}/${y}`;
        }

}

export default FormatDate