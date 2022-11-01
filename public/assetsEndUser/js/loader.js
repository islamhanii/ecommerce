class Loader {
    myRequest = new XMLHttpRequest();
    pageURL = "";

    dataLoader(url = this.pageURL) {
        if(url !== this.pageURL) {
            this.pageURL = url;
            this.myRequest.onreadystatechange = function() {
                if(this.readyState === 4 && this.status === 200) {
                    let creator = new Creator();
                    data = JSON.parse(this.responseText).data;
                    creator.run();
                }
            };
        
            this.myRequest.open(
                'GET',
                url,
                true);
            
            this.myRequest.send();
        }
    }
}