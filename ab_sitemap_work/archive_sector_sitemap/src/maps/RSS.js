class RSS {
    static site = [{
        "name": "rss",
        "url": "http://www.nationalarchives.gov.uk/rss/",
        "level": "1",
        "children": [
            {
                "name": "news.xml",
                "parent": "rss",
                "url": "http://www.nationalarchives.gov.uk/rss/news.xml",
                "level": "2"
            },
            {
                "name": "foireleasesnews.xml",
                "parent": "rss",
                "url": "http://www.nationalarchives.gov.uk/rss/foireleasesnews.xml",
                "level": "2"
            },
            {
                "name": "podcasts.xml",
                "parent": "rss",
                "url": "http://www.nationalarchives.gov.uk/rss/podcasts.xml",
                "level": "2"
            },
            {
                "name": "psi-updates.xml",
                "parent": "rss",
                "url": "http://www.nationalarchives.gov.uk/rss/psi-updates.xml",
                "level": "2"
            },
            {
                "name": "psi-updates-new.xml",
                "parent": "rss",
                "url": "http://www.nationalarchives.gov.uk/rss/psi-updates-new.xml",
                "level": "2"
            }
        ]
    }]
}
export default RSS;