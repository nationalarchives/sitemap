class WebArchive {
    static site = [{
            "name": "webarchive",
            "url": "http://www.nationalarchives.gov.uk/webarchive/",
            "level": "1",
            "children": [
                {
                    "name": "atoz",
                    "parent": "webarchive",
                    "url": "http://www.nationalarchives.gov.uk/webarchive/atoz/",
                    "level": "2"
                },
                {
                    "name": "information",
                    "parent": "webarchive",
                    "url": "http://www.nationalarchives.gov.uk/webarchive/information/",
                    "level": "2"
                },
                {
                    "name": "guidance",
                    "parent": "webarchive",
                    "url": "http://www.nationalarchives.gov.uk/webarchive/guidance/",
                    "level": "2"
                }
            ],
            "unsorted-children": [
                {
                    "name": "embed",
                    "parent": "1.0",
                    "url": "http://www.nationalarchives.gov.uk/webarchive/wp-json/oembed/1.0/embed/?url=http%3A%2F%2Fwebarchive.livelb.nationalarchives.gov.uk%2Fatoz%2F&format=xml",
                    "level": "7",
                    "param": "url=http%3A%2F%2Fwebarchive.livelb.nationalarchives.gov.uk%2Fatoz%2F&format=xml"
                },
                {
                    "name": "embed",
                    "parent": "1.0",
                    "url": "http://www.nationalarchives.gov.uk/webarchive/wp-json/oembed/1.0/embed/?url=http%3A%2F%2Fwebarchive.livelb.nationalarchives.gov.uk%2Finformation%2F&format=xml",
                    "level": "7",
                    "param": "url=http%3A%2F%2Fwebarchive.livelb.nationalarchives.gov.uk%2Finformation%2F&format=xml"
                },
                {
                    "name": "embed",
                    "parent": "1.0",
                    "url": "http://www.nationalarchives.gov.uk/webarchive/wp-json/oembed/1.0/embed/?url=http%3A%2F%2Fwebarchive.livelb.nationalarchives.gov.uk%2Fguidance%2F&format=xml",
                    "level": "7",
                    "param": "url=http%3A%2F%2Fwebarchive.livelb.nationalarchives.gov.uk%2Fguidance%2F&format=xml"
                }
            ]
        }];
}

export default WebArchive;