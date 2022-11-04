class Loader {
    myRequest = new XMLHttpRequest();
    pageURL = "";

    dataLoader(url = this.pageURL, size_id) {
        let creator = new Creator();
        if(size_id in dataCollection) {
            console.log('hi');
            data = dataCollection[size_id];
            creator.run();
        }
        else if(url !== this.pageURL) {
            this.pageURL = url;
            this.myRequest.onreadystatechange = function() {
                if(this.readyState === 4 && this.status === 200) {
                    data = JSON.parse(this.responseText).data;
                    if(data.length > 0) {
                        dataCollection[size_id] = data;
                        creator.run();
                    }
                    else {
                        creator.errorGenerator();
                    }
                }
            };
        
            this.myRequest.open(
                'GET',
                url,
                true);
            
            this.myRequest.send();
        }
        else {
            creator.errorGenerator();
        }
    }
}