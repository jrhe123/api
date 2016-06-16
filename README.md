##API documentation
    1.URL：https://demo6656263.herokuapp.com/api
##Category
1.  [API demo](#1)

##1. API demo
###API description：
    http method: GET
###Parameter description：
| parameter   | optional   |   detail        |
| --------    |    -----:  |  :----------:   |
| start_date  |   yes      | format:1-Jan-16 |
| end_date    |   yes      | format:1-Jan-16 |
###Response description：
#####Failure to connnect the database
    {"code":400, "message":"fail to connect database!"}
#####No requested data found, return JSON
    {"code":1000, "message":"no data found at the target range!"}
#####Success, return JSON
    {"code":200, "message":"successfully return data!","data":"requested data"}