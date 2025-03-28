define({ "api": [{
    "type": "post",
    "url": "/blog/add",
    "title": "Add Blog.",
    "version": "0.1.0",
    "name": "Addblog",
    "group": "blog",
    "header": {
      "fields": {
        "Header": [
          {
            "group": "Header",
            "type": "String",
            "optional": false,
            "field": "X-Api-Key",
            "description": "<p>Blog unique access-key.</p>"
          }
          ,
          {
            "group": "Header",
            "type": "String",
            "optional": false,
            "field": "X-Token",
            "description": "<p>Blog unique token.</p>"
          }
                  ]
      }
    },
    "permission": [
      {
        "name": "Blog Cant be Accessed permission name : api_blog_add"
      }
    ],
    "parameter": {
      "fields": {
        "Parameter": [
                    {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "Slug",
            "description": "<p>Mandatory slug of Blogs Input Slug Max Length : 200..</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "Content",
            "description": "<p>Mandatory content of Blogs .</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "Title",
            "description": "<p>Mandatory title of Blogs Input Title Max Length : 255..</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "Image",
            "description": "<p>Mandatory image of Blogs .</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "Category",
            "description": "<p>Mandatory category of Blogs Input Category Max Length : 200..</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "Tags",
            "description": "<p>Mandatory tags of Blogs .</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "Status",
            "description": "<p>Mandatory status of Blogs Input Status Max Length : 10..</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "Author",
            "description": "<p>Mandatory author of Blogs Input Author Max Length : 100..</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "Viewers",
            "description": "<p>Mandatory viewers of Blogs Input Viewers Max Length : 11..</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "Created_at",
            "description": "<p>Mandatory created_at of Blogs .</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "Updated_at",
            "description": "<p>Mandatory updated_at of Blogs .</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "Boolean",
            "optional": false,
            "field": "Status",
            "description": "<p>status response api.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "Message",
            "description": "<p>message response api.</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Success-Response:",
          "content": "HTTP/1.1 200 OK",
          "type": "json"
        }
      ]
    },
    "error": {
      "fields": {
        "Error 4xx": [
          {
            "group": "Error 4xx",
            "optional": false,
            "field": "ValidationError",
            "description": "<p>Error validation.</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Error-Response:",
          "content": "HTTP/1.1 403 Not Acceptable",
          "type": "json"
        }
      ]
    },
    "filename": "application/controllers/api/Blog.php",
    "groupTitle": "Blog"
  },
  {
    "type": "get",
    "url": "/blog/all",
    "title": "Get all Blogs.",
    "version": "0.1.0",
    "name": "Allblog",
    "group": "blog",
    "header": {
      "fields": {
        "Header": [
          {
            "group": "Header",
            "type": "String",
            "optional": false,
            "field": "X-Api-Key",
            "description": "<p>Blogs unique access-key.</p>"
          },
          {
            "group": "Header",
            "type": "String",
            "optional": false,
            "field": "X-Token",
            "description": "<p>Blogs unique token.</p>"
          }
        ]
      }
    },
    "permission": [
      {
        "name": "{} Cant be Accessed permission name : api_Blog_all"
      }
    ],
    "parameter": {
      "fields": {
        "Parameter": [
         
          {
            "group": "Parameter",
            "type": "String",
            "optional": true,
            "field": "Field",
            "defaultValue": "All Field",
            "description": "<p>Optional field of Blogs.</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": true,
            "field": "Start",
            "defaultValue": "0",
            "description": "<p>Optional start index of Blogs.</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": true,
            "field": "Limit",
            "defaultValue": "10",
            "description": "<p>Optional limit data of Blogs.</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "Boolean",
            "optional": false,
            "field": "Status",
            "description": "<p>status response api.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "Message",
            "description": "<p>message response api.</p>"
          },
          {
            "group": "Success 200",
            "type": "Array",
            "optional": false,
            "field": "Data",
            "description": "<p>data of Blog.</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Success-Response:",
          "content": "HTTP/1.1 200 OK",
          "type": "json"
        }
      ]
    },
    "error": {
      "fields": {
        "Error 4xx": [
          {
            "group": "Error 4xx",
            "optional": false,
            "field": "NoDataBlog",
            "description": "<p>Blog data is nothing.</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Error-Response:",
          "content": "HTTP/1.1 403 Not Acceptable",
          "type": "json"
        }
      ]
    },
    "filename": "application/controllers/api/Blog.php",
    "groupTitle": "Blog"
  },
  {
    "type": "post",
    "url": "/Blog/delete",
    "title": "Delete Blog.",
    "version": "0.1.0",
    "name": "Deleteblog",
    "group": "blog",
    "header": {
      "fields": {
        "Header": [
          {
            "group": "Header",
            "type": "String",
            "optional": false,
            "field": "X-Api-Key",
            "description": "<p>Blogs unique access-key.</p>"
          },
          {
            "group": "Header",
            "type": "String",
            "optional": false,
            "field": "X-Token",
            "description": "<p>Blogs unique token.</p>"
          }
        ]
      }
    },
    "permission": [
      {
        "name": "Blog Cant be Accessed permission name : api_Blog_delete"
      }
    ],
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": false,
            "field": "Id",
            "description": "<p>Mandatory id of Blogs .</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "Boolean",
            "optional": false,
            "field": "Status",
            "description": "<p>status response api.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "Message",
            "description": "<p>message response api.</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Success-Response:",
          "content": "HTTP/1.1 200 OK",
          "type": "json"
        }
      ]
    },
    "error": {
      "fields": {
        "Error 4xx": [
          {
            "group": "Error 4xx",
            "optional": false,
            "field": "ValidationError",
            "description": "<p>Error validation.</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Error-Response:",
          "content": "HTTP/1.1 403 Not Acceptable",
          "type": "json"
        }
      ]
    },
    "filename": "application/controllers/api/Blog.php",
    "groupTitle": "Blog"
  },
  {
    "type": "get",
    "url": "/Blog/detail",
    "title": "Detail Blog.",
    "version": "0.1.0",
    "name": "Detailblog",
    "group": "blog",
    "header": {
      "fields": {
        "Header": [
          {
            "group": "Header",
            "type": "String",
            "optional": false,
            "field": "X-Api-Key",
            "description": "<p>Blogs unique access-key.</p>"
          },
          {
            "group": "Header",
            "type": "String",
            "optional": false,
            "field": "X-Token",
            "description": "<p>Blogs unique token.</p>"
          }
        ]
      }
    },
    "permission": [
      {
        "name": "Blog Cant be Accessed permission name : api_Blog_detail"
      }
    ],
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": false,
            "field": "Id",
            "description": "<p>Mandatory id of Blogs.</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "Boolean",
            "optional": false,
            "field": "Status",
            "description": "<p>status response api.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "Message",
            "description": "<p>message response api.</p>"
          },
          {
            "group": "Success 200",
            "type": "Array",
            "optional": false,
            "field": "Data",
            "description": "<p>data of Blog.</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Success-Response:",
          "content": "HTTP/1.1 200 OK",
          "type": "json"
        }
      ]
    },
    "error": {
      "fields": {
        "Error 4xx": [
          {
            "group": "Error 4xx",
            "optional": false,
            "field": "BlogNotFound",
            "description": "<p>Blog data is not found.</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Error-Response:",
          "content": "HTTP/1.1 403 Not Acceptable",
          "type": "json"
        }
      ]
    },
    "filename": "application/controllers/api/Blog.php",
    "groupTitle": "Blog"
  },
  {
    "type": "post",
    "url": "/Blog/update",
    "title": "Update Blog.",
    "version": "0.1.0",
    "name": "Updateblog",
    "group": "blog",
    "header": {
      "fields": {
        "Header": [
          {
            "group": "Header",
            "type": "String",
            "optional": false,
            "field": "X-Api-Key",
            "description": "<p>Blogs unique access-key.</p>"
          },
          {
            "group": "Header",
            "type": "String",
            "optional": false,
            "field": "X-Token",
            "description": "<p>Blogs unique token.</p>"
          }
        ]
      }
    },
    "permission": [
      {
        "name": "Blog Cant be Accessed permission name : api_Blog_update"
      }
    ],
    "parameter": {
      "fields": {
        "Parameter": [
                    {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "Slug",
            "description": "<p>Mandatory slug of Blogs Input Slug Max Length : 200..</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "Content",
            "description": "<p>Mandatory content of Blogs .</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "Title",
            "description": "<p>Mandatory title of Blogs Input Title Max Length : 255..</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "Image",
            "description": "<p>Mandatory image of Blogs .</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "Category",
            "description": "<p>Mandatory category of Blogs Input Category Max Length : 200..</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "Tags",
            "description": "<p>Mandatory tags of Blogs .</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "Status",
            "description": "<p>Mandatory status of Blogs Input Status Max Length : 10..</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "Author",
            "description": "<p>Mandatory author of Blogs Input Author Max Length : 100..</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "Viewers",
            "description": "<p>Mandatory viewers of Blogs Input Viewers Max Length : 11..</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "Created_at",
            "description": "<p>Mandatory created_at of Blogs .</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "Updated_at",
            "description": "<p>Mandatory updated_at of Blogs .</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "Boolean",
            "optional": false,
            "field": "Status",
            "description": "<p>status response api.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "Message",
            "description": "<p>message response api.</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Success-Response:",
          "content": "HTTP/1.1 200 OK",
          "type": "json"
        }
      ]
    },
    "error": {
      "fields": {
        "Error 4xx": [
          {
            "group": "Error 4xx",
            "optional": false,
            "field": "ValidationError",
            "description": "<p>Error validation.</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Error-Response:",
          "content": "HTTP/1.1 403 Not Acceptable",
          "type": "json"
        }
      ]
    },
    "filename": "application/controllers/api/Blog.php",
    "groupTitle": "Blog"
  }, {
    "type": "post",
    "url": "/group/add",
    "title": "Add Group.",
    "version": "0.1.0",
    "name": "AddGroup",
    "group": "Group",
    "header": {
      "fields": {
        "Header": [
          {
            "group": "Header",
            "type": "String",
            "optional": false,
            "field": "X-API-KEY",
            "description": "<p>Groups unique access-key.</p>"
          },
          {
            "group": "Header",
            "type": "String",
            "optional": false,
            "field": "X-Token",
            "description": "<p>Groups unique token.</p>"
          }
        ]
      }
    },
    "permission": [
      {
        "name": "Group Cant be Accessed permission name : api_group_add"
      }
    ],
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "Name",
            "description": "<p>Mandatory name of Groups.</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": true,
            "field": "Definition",
            "description": "<p>Optional definition of Groups.</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "Boolean",
            "optional": false,
            "field": "Status",
            "description": "<p>status response api.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "Message",
            "description": "<p>message response api.</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Success-Response:",
          "content": "HTTP/1.1 200 OK",
          "type": "json"
        }
      ]
    },
    "error": {
      "fields": {
        "Error 4xx": [
          {
            "group": "Error 4xx",
            "optional": false,
            "field": "ValidationError",
            "description": "<p>Error validation.</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Error-Response:",
          "content": "HTTP/1.1 403 Not Acceptable",
          "type": "json"
        }
      ]
    },
    "filename": "application/controllers/api/Group.php",
    "groupTitle": "Group"
  },
  {
    "type": "get",
    "url": "/group/all",
    "title": "Get all groups.",
    "version": "0.1.0",
    "name": "AllGroup",
    "group": "Group",
    "header": {
      "fields": {
        "Header": [
          {
            "group": "Header",
            "type": "String",
            "optional": false,
            "field": "X-API-KEY",
            "description": "<p>Groups unique access-key.</p>"
          },
          {
            "group": "Header",
            "type": "String",
            "optional": false,
            "field": "X-Token",
            "description": "<p>Groups unique token.</p>"
          }
        ]
      }
    },
    "permission": [
      {
        "name": "Group Cant be Accessed permission name : api_group_all"
      }
    ],
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "String",
            "optional": true,
            "field": "Filter",
            "defaultValue": "null",
            "description": "<p>Optional filter of Groups.</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": true,
            "field": "Field",
            "defaultValue": "All Field",
            "description": "<p>Optional field of Groups.</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": true,
            "field": "Start",
            "defaultValue": "0",
            "description": "<p>Optional start index of Groups.</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": true,
            "field": "Limit",
            "defaultValue": "10",
            "description": "<p>Optional limit data of Groups.</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "Boolean",
            "optional": false,
            "field": "Status",
            "description": "<p>status response api.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "Message",
            "description": "<p>message response api.</p>"
          },
          {
            "group": "Success 200",
            "type": "Array",
            "optional": false,
            "field": "Data",
            "description": "<p>data of group.</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Success-Response:",
          "content": "HTTP/1.1 200 OK",
          "type": "json"
        }
      ]
    },
    "error": {
      "fields": {
        "Error 4xx": [
          {
            "group": "Error 4xx",
            "optional": false,
            "field": "NoDataGroup",
            "description": "<p>Group data is nothing.</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Error-Response:",
          "content": "HTTP/1.1 403 Not Acceptable",
          "type": "json"
        }
      ]
    },
    "filename": "application/controllers/api/Group.php",
    "groupTitle": "Group"
  },
  {
    "type": "post",
    "url": "/group/delete",
    "title": "Delete Group.",
    "version": "0.1.0",
    "name": "DeleteGroup",
    "group": "Group",
    "header": {
      "fields": {
        "Header": [
          {
            "group": "Header",
            "type": "String",
            "optional": false,
            "field": "X-API-KEY",
            "description": "<p>Groups unique access-key.</p>"
          },
          {
            "group": "Header",
            "type": "String",
            "optional": false,
            "field": "X-Token",
            "description": "<p>Groups unique token.</p>"
          }
        ]
      }
    },
    "permission": [
      {
        "name": "Group Cant be Accessed permission name : api_group_delete"
      }
    ],
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": false,
            "field": "Id",
            "description": "<p>Mandatory id of Groups .</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "Boolean",
            "optional": false,
            "field": "Status",
            "description": "<p>status response api.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "Message",
            "description": "<p>message response api.</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Success-Response:",
          "content": "HTTP/1.1 200 OK",
          "type": "json"
        }
      ]
    },
    "error": {
      "fields": {
        "Error 4xx": [
          {
            "group": "Error 4xx",
            "optional": false,
            "field": "ValidationError",
            "description": "<p>Error validation.</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Error-Response:",
          "content": "HTTP/1.1 403 Not Acceptable",
          "type": "json"
        }
      ]
    },
    "filename": "application/controllers/api/Group.php",
    "groupTitle": "Group"
  },
  {
    "type": "get",
    "url": "/group/detail",
    "title": "Detail Group.",
    "version": "0.1.0",
    "name": "DetailGroup",
    "group": "Group",
    "header": {
      "fields": {
        "Header": [
          {
            "group": "Header",
            "type": "String",
            "optional": false,
            "field": "X-API-KEY",
            "description": "<p>Groups unique access-key.</p>"
          },
          {
            "group": "Header",
            "type": "String",
            "optional": false,
            "field": "X-Token",
            "description": "<p>Groups unique token.</p>"
          }
        ]
      }
    },
    "permission": [
      {
        "name": "Group Cant be Accessed permission name : api_group_detail"
      }
    ],
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": false,
            "field": "Id",
            "description": "<p>Mandatory id of Groups.</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "Boolean",
            "optional": false,
            "field": "Status",
            "description": "<p>status response api.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "Message",
            "description": "<p>message response api.</p>"
          },
          {
            "group": "Success 200",
            "type": "Array",
            "optional": false,
            "field": "Data",
            "description": "<p>data of group.</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Success-Response:",
          "content": "HTTP/1.1 200 OK",
          "type": "json"
        }
      ]
    },
    "error": {
      "fields": {
        "Error 4xx": [
          {
            "group": "Error 4xx",
            "optional": false,
            "field": "GroupNotFound",
            "description": "<p>Group data is not found.</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Error-Response:",
          "content": "HTTP/1.1 403 Not Acceptable",
          "type": "json"
        }
      ]
    },
    "filename": "application/controllers/api/Group.php",
    "groupTitle": "Group"
  },
  {
    "type": "post",
    "url": "/group/update",
    "title": "Update Group.",
    "version": "0.1.0",
    "name": "UpdateGroup",
    "group": "Group",
    "header": {
      "fields": {
        "Header": [
          {
            "group": "Header",
            "type": "String",
            "optional": false,
            "field": "X-API-KEY",
            "description": "<p>Groups unique access-key.</p>"
          },
          {
            "group": "Header",
            "type": "String",
            "optional": false,
            "field": "X-Token",
            "description": "<p>Groups unique token.</p>"
          }
        ]
      }
    },
    "permission": [
      {
        "name": "Group Cant be Accessed permission name : api_group_update"
      }
    ],
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "Name",
            "description": "<p>Mandatory Name of Groups.</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": true,
            "field": "Definition",
            "description": "<p>Optional definition of Groups.</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "Boolean",
            "optional": false,
            "field": "Status",
            "description": "<p>status response api.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "Message",
            "description": "<p>message response api.</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Success-Response:",
          "content": "HTTP/1.1 200 OK",
          "type": "json"
        }
      ]
    },
    "error": {
      "fields": {
        "Error 4xx": [
          {
            "group": "Error 4xx",
            "optional": false,
            "field": "ValidationError",
            "description": "<p>Error validation.</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Error-Response:",
          "content": "HTTP/1.1 403 Not Acceptable",
          "type": "json"
        }
      ]
    },
    "filename": "application/controllers/api/Group.php",
    "groupTitle": "Group"
  },{
"type": "post",
"url": "/tag_location/add",
"title": "Add Tag location.",
"version": "0.1.0",
"name": "Addtag_location",
"group": "tag_location",
"header": {
"fields": {
"Header": [
{
"group": "Header",
"type": "String",
"optional": false,
"field": "X-Api-Key",
"description": "<p>Tag location unique access-key.</p>"
}
]
}
},
"permission": [
{
"name": "Tag location Cant be Accessed permission name : api_tag_location_add"
}
],
"parameter": {
"fields": {
"Parameter": [
  {
  "group": "Parameter",
  "type": "String",
  "optional": false,
  "field": "Rfid_id",
  "description": "<p>Mandatory rfid_id of Tag locations .</p>"
  },
  {
  "group": "Parameter",
  "type": "String",
  "optional": false,
  "field": "Librarian_id",
  "description": "<p>Mandatory librarian_id of Tag locations .</p>"
  },
  {
  "group": "Parameter",
  "type": "String",
  "optional": false,
  "field": "Location_status",
  "description": "<p>Mandatory location_status of Tag locations .</p>"
  },
  {
  "group": "Parameter",
  "type": "String",
  "optional": true,
  "field": "Location_created",
  "description": "<p>Optional location_created of Tag locations .</p>"
  },
  {
  "group": "Parameter",
  "type": "String",
  "optional": true,
  "field": "Location_updated",
  "description": "<p>Optional location_updated of Tag locations .</p>"
  }
]
}
},
"success": {
"fields": {
"Success 200": [
{
"group": "Success 200",
"type": "Boolean",
"optional": false,
"field": "Status",
"description": "<p>status response api.</p>"
},
{
"group": "Success 200",
"type": "String",
"optional": false,
"field": "Message",
"description": "<p>message response api.</p>"
}
]
},
"examples": [
{
"title": "Success-Response:",
"content": "HTTP/1.1 200 OK",
"type": "json"
}
]
},
"error": {
"fields": {
"Error 4xx": [
{
"group": "Error 4xx",
"optional": false,
"field": "ValidationError",
"description": "<p>Error validation.</p>"
}
]
},
"examples": [
{
"title": "Error-Response:",
"content": "HTTP/1.1 403 Not Acceptable",
"type": "json"
}
]
},
"filename": "application/controllers/api/Tag_location.php",
"groupTitle": "Tag location"
},
{
"type": "get",
"url": "/tag_location/all",
"title": "Get all Tag locations.",
"version": "0.1.0",
"name": "Alltag_location",
"group": "tag_location",
"header": {
"fields": {
"Header": [
{
"group": "Header",
"type": "String",
"optional": false,
"field": "X-Api-Key",
"description": "<p>Tag locations unique access-key.</p>"
},
{
"group": "Header",
"type": "String",
"optional": false,
"field": "X-Token",
"description": "<p>Tag locations unique token.</p>"
}
]
}
},
"permission": [
{
"name": "{} Cant be Accessed permission name : api_Tag location_all"
}
],
"parameter": {
"fields": {
"Parameter": [


{
"group": "Parameter",
"type": "String",
"optional": true,
"field": "Field",
"defaultValue": "All Field",
"description": "<p>Optional field of Tag locations.</p>"
},
{
"group": "Parameter",
"type": "String",
"optional": true,
"field": "Start",
"defaultValue": "0",
"description": "<p>Optional start index of Tag locations.</p>"
},
{
"group": "Parameter",
"type": "String",
"optional": true,
"field": "Limit",
"defaultValue": "10",
"description": "<p>Optional limit data of Tag locations.</p>"
},
{
"group": "Parameter",
"type": "String",
"optional": true,
"field": "Sort_field",
"defaultValue": "location_id",
"description": "<p>Sort data by this field. location_id, rfid_id, librarian_id, location_status, location_aging, location_created, location_updated</p>"
},
{
"group": "Parameter",
"type": "String",
"optional": true,
"field": "Sort_order",
"defaultValue": "DESC",
"description": "<p>Sort data order this field ASC or DESC.</p>"
},
{
"group": "Parameter",
"type": "String",
"optional": true,
"field": "Filters",
"defaultValue": "",
"description": "<p>filters[0][lg] = <code>AND</code>, <code>OR</code><br>filters[0][co][0][fl] = <code>location_id</code><br>filters[0][co][0][op] = <code>equal</code>, <code>not_equal</code>, <code>greather</code>, <code>greather_equal</code>, <code>smaller_equal</code>, <code>smaller</code>, <code>is_null</code>, <code>not_null</code>, <code>where_in</code>, <code>where_not_in</code>, <code>like</code><br>filters[0][co][0][vl] = 1<br>filters[0][co][0][lg] = <code>OR</code>, <code>AND</code><br><br><br><span class=\"label \">Note</span> : if use like operator you need append <code>%your term%</code> on vl<br>for <code>BETWEEN</code> or <code>IN</code> you can use val1, val2, ..etc</p>"
}
]
}
},
"success": {
"fields": {
"Success 200": [
{
"group": "Success 200",
"type": "Boolean",
"optional": false,
"field": "Status",
"description": "<p>status response api.</p>"
},
{
"group": "Success 200",
"type": "String",
"optional": false,
"field": "Message",
"description": "<p>message response api.</p>"
},
{
"group": "Success 200",
"type": "Array",
"optional": false,
"field": "Data",
"description": "<p>data of Tag location.</p>"
}
]
},
"examples": [
{
"title": "Success-Response:",
"content": "HTTP/1.1 200 OK",
"type": "json"
}
]
},
"error": {
"fields": {
"Error 4xx": [
{
"group": "Error 4xx",
"optional": false,
"field": "NoDataTag location",
"description": "<p>Tag location data is nothing.</p>"
}
]
},
"examples": [
{
"title": "Error-Response:",
"content": "HTTP/1.1 403 Not Acceptable",
"type": "json"
}
]
},
"filename": "application/controllers/api/Tag location.php",
"groupTitle": "Tag location"
},
{
"type": "post",
"url": "/tag_location/delete",
"title": "Delete Tag location.",
"version": "0.1.0",
"name": "Deletetag_location",
"group": "tag_location",
"header": {
"fields": {
"Header": [
{
"group": "Header",
"type": "String",
"optional": false,
"field": "X-Api-Key",
"description": "<p>Tag locations unique access-key.</p>"
},
{
"group": "Header",
"type": "String",
"optional": false,
"field": "X-Token",
"description": "<p>Tag locations unique token.</p>"
}
]
}
},
"permission": [
{
"name": "Tag location Cant be Accessed permission name : api_Tag location_delete"
}
],
"parameter": {
"fields": {
"Parameter": [
{
"group": "Parameter",
"type": "Integer",
"optional": false,
"field": "Id",
"description": "<p>Mandatory id of Tag locations .</p>"
}
]
}
},
"success": {
"fields": {
"Success 200": [
{
"group": "Success 200",
"type": "Boolean",
"optional": false,
"field": "Status",
"description": "<p>status response api.</p>"
},
{
"group": "Success 200",
"type": "String",
"optional": false,
"field": "Message",
"description": "<p>message response api.</p>"
}
]
},
"examples": [
{
"title": "Success-Response:",
"content": "HTTP/1.1 200 OK",
"type": "json"
}
]
},
"error": {
"fields": {
"Error 4xx": [
{
"group": "Error 4xx",
"optional": false,
"field": "ValidationError",
"description": "<p>Error validation.</p>"
}
]
},
"examples": [
{
"title": "Error-Response:",
"content": "HTTP/1.1 403 Not Acceptable",
"type": "json"
}
]
},
"filename": "application/controllers/api/Tag location.php",
"groupTitle": "Tag location"
},
{
"type": "get",
"url": "/tag_location/detail",
"title": "Detail Tag location.",
"version": "0.1.0",
"name": "Detailtag_location",
"group": "tag_location",
"header": {
"fields": {
"Header": [
{
"group": "Header",
"type": "String",
"optional": false,
"field": "X-Api-Key",
"description": "<p>Tag locations unique access-key.</p>"
},
{
"group": "Header",
"type": "String",
"optional": false,
"field": "X-Token",
"description": "<p>Tag locations unique token.</p>"
}
]
}
},
"permission": [
{
"name": "Tag location Cant be Accessed permission name : api_Tag location_detail"
}
],
"parameter": {
"fields": {
"Parameter": [
{
"group": "Parameter",
"type": "Integer",
"optional": false,
"field": "Id",
"description": "<p>Mandatory id of Tag locations.</p>"
}
]
}
},
"success": {
"fields": {
"Success 200": [
{
"group": "Success 200",
"type": "Boolean",
"optional": false,
"field": "Status",
"description": "<p>status response api.</p>"
},
{
"group": "Success 200",
"type": "String",
"optional": false,
"field": "Message",
"description": "<p>message response api.</p>"
},
{
"group": "Success 200",
"type": "Array",
"optional": false,
"field": "Data",
"description": "<p>data of Tag location.</p>"
}
]
},
"examples": [
{
"title": "Success-Response:",
"content": "HTTP/1.1 200 OK",
"type": "json"
}
]
},
"error": {
"fields": {
"Error 4xx": [
{
"group": "Error 4xx",
"optional": false,
"field": "Tag locationNotFound",
"description": "<p>Tag location data is not found.</p>"
}
]
},
"examples": [
{
"title": "Error-Response:",
"content": "HTTP/1.1 403 Not Acceptable",
"type": "json"
}
]
},
"filename": "application/controllers/api/Tag location.php",
"groupTitle": "Tag location"
},
{
"type": "post",
"url": "/tag_location/update",
"title": "Update Tag location.",
"version": "0.1.0",
"name": "Updatetag_location",
"group": "tag_location",
"header": {
"fields": {
"Header": [
{
"group": "Header",
"type": "String",
"optional": false,
"field": "X-Api-Key",
"description": "<p>Tag locations unique access-key.</p>"
},
{
"group": "Header",
"type": "String",
"optional": false,
"field": "X-Token",
"description": "<p>Tag locations unique token.</p>"
}
]
}
},
"permission": [
{
"name": "Tag location Cant be Accessed permission name : api_Tag location_update"
}
],
"parameter": {
"fields": {
"Parameter": [
  {
  "group": "Parameter",
  "type": "String",
  "optional": false,
  "field": "Rfid_id",
  "description": "<p>Mandatory rfid_id of Tag locations .</p>"
  },
  {
  "group": "Parameter",
  "type": "String",
  "optional": false,
  "field": "Librarian_id",
  "description": "<p>Mandatory librarian_id of Tag locations .</p>"
  },
  {
  "group": "Parameter",
  "type": "String",
  "optional": false,
  "field": "Location_status",
  "description": "<p>Mandatory location_status of Tag locations .</p>"
  },
  {
  "group": "Parameter",
  "type": "String",
  "optional": true,
  "field": "Location_created",
  "description": "<p>Optional location_created of Tag locations .</p>"
  },
  {
  "group": "Parameter",
  "type": "String",
  "optional": true,
  "field": "Location_updated",
  "description": "<p>Optional location_updated of Tag locations .</p>"
  }
]
}
},
"success": {
"fields": {
"Success 200": [
{
"group": "Success 200",
"type": "Boolean",
"optional": false,
"field": "Status",
"description": "<p>status response api.</p>"
},
{
"group": "Success 200",
"type": "String",
"optional": false,
"field": "Message",
"description": "<p>message response api.</p>"
}
]
},
"examples": [
{
"title": "Success-Response:",
"content": "HTTP/1.1 200 OK",
"type": "json"
}
]
},
"error": {
"fields": {
"Error 4xx": [
{
"group": "Error 4xx",
"optional": false,
"field": "ValidationError",
"description": "<p>Error validation.</p>"
}
]
},
"examples": [
{
"title": "Error-Response:",
"content": "HTTP/1.1 403 Not Acceptable",
"type": "json"
}
]
},
"filename": "application/controllers/api/Tag location.php",
"groupTitle": "Tag location"
},{
"type": "post",
"url": "/tag_reader/add",
"title": "Add Tag reader.",
"version": "0.1.0",
"name": "Addtag_reader",
"group": "tag_reader",
"header": {
"fields": {
"Header": [
{
"group": "Header",
"type": "String",
"optional": false,
"field": "X-Api-Key",
"description": "<p>Tag reader unique access-key.</p>"
}
,
{
"group": "Header",
"type": "String",
"optional": false,
"field": "X-Token",
"description": "<p>Tag reader unique token.</p>"
}
]
}
},
"permission": [
{
"name": "Tag reader Cant be Accessed permission name : api_tag_reader_add"
}
],
"parameter": {
"fields": {
"Parameter": [
  {
  "group": "Parameter",
  "type": "String",
  "optional": false,
  "field": "Room_id",
  "description": "<p>Mandatory room_id of Tag readers .</p>"
  },
  {
  "group": "Parameter",
  "type": "String",
  "optional": false,
  "field": "Reader_name",
  "description": "<p>Mandatory reader_name of Tag readers Input Reader Name Max Length : 50..</p>"
  },
  {
  "group": "Parameter",
  "type": "String",
  "optional": false,
  "field": "Setfor",
  "description": "<p>Mandatory setfor of Tag readers .</p>"
  },
  {
  "group": "Parameter",
  "type": "String",
  "optional": false,
  "field": "Reader_serialnumber",
  "description": "<p>Mandatory reader_serialnumber of Tag readers Input Reader Serialnumber Max Length : 10..</p>"
  },
  {
  "group": "Parameter",
  "type": "String",
  "optional": false,
  "field": "Reader_type",
  "description": "<p>Mandatory reader_type of Tag readers .</p>"
  },
  {
  "group": "Parameter",
  "type": "String",
  "optional": false,
  "field": "Reader_ip",
  "description": "<p>Mandatory reader_ip of Tag readers Input Reader Ip Max Length : 45..</p>"
  },
  {
  "group": "Parameter",
  "type": "String",
  "optional": false,
  "field": "Reader_port",
  "description": "<p>Mandatory reader_port of Tag readers Input Reader Port Max Length : 7..</p>"
  },
  {
  "group": "Parameter",
  "type": "String",
  "optional": false,
  "field": "Reader_com",
  "description": "<p>Mandatory reader_com of Tag readers .</p>"
  },
  {
  "group": "Parameter",
  "type": "String",
  "optional": false,
  "field": "Reader_baudrate",
  "description": "<p>Mandatory reader_baudrate of Tag readers .</p>"
  },
  {
  "group": "Parameter",
  "type": "String",
  "optional": false,
  "field": "Reader_power",
  "description": "<p>Mandatory reader_power of Tag readers .</p>"
  },
  {
  "group": "Parameter",
  "type": "String",
  "optional": false,
  "field": "Reader_interval",
  "description": "<p>Mandatory reader_interval of Tag readers .</p>"
  },
  {
  "group": "Parameter",
  "type": "String",
  "optional": false,
  "field": "Reader_mode",
  "description": "<p>Mandatory reader_mode of Tag readers .</p>"
  },
  {
  "group": "Parameter",
  "type": "String",
  "optional": false,
  "field": "Reader_updatedby",
  "description": "<p>Mandatory reader_updatedby of Tag readers .</p>"
  },
  {
  "group": "Parameter",
  "type": "String",
  "optional": false,
  "field": "Reader_updated",
  "description": "<p>Mandatory reader_updated of Tag readers .</p>"
  },
  {
  "group": "Parameter",
  "type": "String",
  "optional": false,
  "field": "Reader_createdby",
  "description": "<p>Mandatory reader_createdby of Tag readers .</p>"
  },
  {
  "group": "Parameter",
  "type": "String",
  "optional": false,
  "field": "Reader_created",
  "description": "<p>Mandatory reader_created of Tag readers .</p>"
  },
  {
  "group": "Parameter",
  "type": "String",
  "optional": false,
  "field": "Reader_family",
  "description": "<p>Mandatory reader_family of Tag readers .</p>"
  },
  {
  "group": "Parameter",
  "type": "String",
  "optional": false,
  "field": "Connecting",
  "description": "<p>Mandatory connecting of Tag readers .</p>"
  },
  {
  "group": "Parameter",
  "type": "String",
  "optional": false,
  "field": "Reader_model",
  "description": "<p>Mandatory reader_model of Tag readers Input Reader Model Max Length : 50..</p>"
  },
  {
  "group": "Parameter",
  "type": "String",
  "optional": false,
  "field": "Reader_identity",
  "description": "<p>Mandatory reader_identity of Tag readers Input Reader Identity Max Length : 50..</p>"
  },
  {
  "group": "Parameter",
  "type": "String",
  "optional": false,
  "field": "Reader_antena",
  "description": "<p>Mandatory reader_antena of Tag readers .</p>"
  },
  {
  "group": "Parameter",
  "type": "String",
  "optional": false,
  "field": "Reader_angle",
  "description": "<p>Mandatory reader_angle of Tag readers .</p>"
  },
  {
  "group": "Parameter",
  "type": "String",
  "optional": false,
  "field": "Reader_gate",
  "description": "<p>Mandatory reader_gate of Tag readers Input Reader Gate Max Length : 50..</p>"
  }
]
}
},
"success": {
"fields": {
"Success 200": [
{
"group": "Success 200",
"type": "Boolean",
"optional": false,
"field": "Status",
"description": "<p>status response api.</p>"
},
{
"group": "Success 200",
"type": "String",
"optional": false,
"field": "Message",
"description": "<p>message response api.</p>"
}
]
},
"examples": [
{
"title": "Success-Response:",
"content": "HTTP/1.1 200 OK",
"type": "json"
}
]
},
"error": {
"fields": {
"Error 4xx": [
{
"group": "Error 4xx",
"optional": false,
"field": "ValidationError",
"description": "<p>Error validation.</p>"
}
]
},
"examples": [
{
"title": "Error-Response:",
"content": "HTTP/1.1 403 Not Acceptable",
"type": "json"
}
]
},
"filename": "application/controllers/api/Tag_reader.php",
"groupTitle": "Tag reader"
},
{
"type": "get",
"url": "/tag_reader/all",
"title": "Get all Tag readers.",
"version": "0.1.0",
"name": "Alltag_reader",
"group": "tag_reader",
"header": {
"fields": {
"Header": [
{
"group": "Header",
"type": "String",
"optional": false,
"field": "X-Api-Key",
"description": "<p>Tag readers unique access-key.</p>"
},
{
"group": "Header",
"type": "String",
"optional": false,
"field": "X-Token",
"description": "<p>Tag readers unique token.</p>"
}
]
}
},
"permission": [
{
"name": "{} Cant be Accessed permission name : api_Tag reader_all"
}
],
"parameter": {
"fields": {
"Parameter": [


{
"group": "Parameter",
"type": "String",
"optional": true,
"field": "Field",
"defaultValue": "All Field",
"description": "<p>Optional field of Tag readers.</p>"
},
{
"group": "Parameter",
"type": "String",
"optional": true,
"field": "Start",
"defaultValue": "0",
"description": "<p>Optional start index of Tag readers.</p>"
},
{
"group": "Parameter",
"type": "String",
"optional": true,
"field": "Limit",
"defaultValue": "10",
"description": "<p>Optional limit data of Tag readers.</p>"
},
{
"group": "Parameter",
"type": "String",
"optional": true,
"field": "Sort_field",
"defaultValue": "reader_id",
"description": "<p>Sort data by this field. reader_id, room_id, reader_name, setfor, reader_serialnumber, reader_type, reader_ip, reader_port, reader_com, reader_baudrate, reader_power, reader_interval, reader_mode, reader_updatedby, reader_updated, reader_createdby, reader_created, reader_family, connecting, reader_model, reader_identity, reader_antena, reader_angle, reader_gate</p>"
},
{
"group": "Parameter",
"type": "String",
"optional": true,
"field": "Sort_order",
"defaultValue": "DESC",
"description": "<p>Sort data order this field ASC or DESC.</p>"
},
{
"group": "Parameter",
"type": "String",
"optional": true,
"field": "Filters",
"defaultValue": "",
"description": "<p>filters[0][lg] = <code>AND</code>, <code>OR</code><br>filters[0][co][0][fl] = <code>reader_id</code><br>filters[0][co][0][op] = <code>equal</code>, <code>not_equal</code>, <code>greather</code>, <code>greather_equal</code>, <code>smaller_equal</code>, <code>smaller</code>, <code>is_null</code>, <code>not_null</code>, <code>where_in</code>, <code>where_not_in</code>, <code>like</code><br>filters[0][co][0][vl] = 1<br>filters[0][co][0][lg] = <code>OR</code>, <code>AND</code><br><br><br><span class=\"label \">Note</span> : if use like operator you need append <code>%your term%</code> on vl<br>for <code>BETWEEN</code> or <code>IN</code> you can use val1, val2, ..etc</p>"
}
]
}
},
"success": {
"fields": {
"Success 200": [
{
"group": "Success 200",
"type": "Boolean",
"optional": false,
"field": "Status",
"description": "<p>status response api.</p>"
},
{
"group": "Success 200",
"type": "String",
"optional": false,
"field": "Message",
"description": "<p>message response api.</p>"
},
{
"group": "Success 200",
"type": "Array",
"optional": false,
"field": "Data",
"description": "<p>data of Tag reader.</p>"
}
]
},
"examples": [
{
"title": "Success-Response:",
"content": "HTTP/1.1 200 OK",
"type": "json"
}
]
},
"error": {
"fields": {
"Error 4xx": [
{
"group": "Error 4xx",
"optional": false,
"field": "NoDataTag reader",
"description": "<p>Tag reader data is nothing.</p>"
}
]
},
"examples": [
{
"title": "Error-Response:",
"content": "HTTP/1.1 403 Not Acceptable",
"type": "json"
}
]
},
"filename": "application/controllers/api/Tag reader.php",
"groupTitle": "Tag reader"
},
{
"type": "post",
"url": "/tag_reader/delete",
"title": "Delete Tag reader.",
"version": "0.1.0",
"name": "Deletetag_reader",
"group": "tag_reader",
"header": {
"fields": {
"Header": [
{
"group": "Header",
"type": "String",
"optional": false,
"field": "X-Api-Key",
"description": "<p>Tag readers unique access-key.</p>"
},
{
"group": "Header",
"type": "String",
"optional": false,
"field": "X-Token",
"description": "<p>Tag readers unique token.</p>"
}
]
}
},
"permission": [
{
"name": "Tag reader Cant be Accessed permission name : api_Tag reader_delete"
}
],
"parameter": {
"fields": {
"Parameter": [
{
"group": "Parameter",
"type": "Integer",
"optional": false,
"field": "Id",
"description": "<p>Mandatory id of Tag readers .</p>"
}
]
}
},
"success": {
"fields": {
"Success 200": [
{
"group": "Success 200",
"type": "Boolean",
"optional": false,
"field": "Status",
"description": "<p>status response api.</p>"
},
{
"group": "Success 200",
"type": "String",
"optional": false,
"field": "Message",
"description": "<p>message response api.</p>"
}
]
},
"examples": [
{
"title": "Success-Response:",
"content": "HTTP/1.1 200 OK",
"type": "json"
}
]
},
"error": {
"fields": {
"Error 4xx": [
{
"group": "Error 4xx",
"optional": false,
"field": "ValidationError",
"description": "<p>Error validation.</p>"
}
]
},
"examples": [
{
"title": "Error-Response:",
"content": "HTTP/1.1 403 Not Acceptable",
"type": "json"
}
]
},
"filename": "application/controllers/api/Tag reader.php",
"groupTitle": "Tag reader"
},
{
"type": "get",
"url": "/tag_reader/detail",
"title": "Detail Tag reader.",
"version": "0.1.0",
"name": "Detailtag_reader",
"group": "tag_reader",
"header": {
"fields": {
"Header": [
{
"group": "Header",
"type": "String",
"optional": false,
"field": "X-Api-Key",
"description": "<p>Tag readers unique access-key.</p>"
},
{
"group": "Header",
"type": "String",
"optional": false,
"field": "X-Token",
"description": "<p>Tag readers unique token.</p>"
}
]
}
},
"permission": [
{
"name": "Tag reader Cant be Accessed permission name : api_Tag reader_detail"
}
],
"parameter": {
"fields": {
"Parameter": [
{
"group": "Parameter",
"type": "Integer",
"optional": false,
"field": "Id",
"description": "<p>Mandatory id of Tag readers.</p>"
}
]
}
},
"success": {
"fields": {
"Success 200": [
{
"group": "Success 200",
"type": "Boolean",
"optional": false,
"field": "Status",
"description": "<p>status response api.</p>"
},
{
"group": "Success 200",
"type": "String",
"optional": false,
"field": "Message",
"description": "<p>message response api.</p>"
},
{
"group": "Success 200",
"type": "Array",
"optional": false,
"field": "Data",
"description": "<p>data of Tag reader.</p>"
}
]
},
"examples": [
{
"title": "Success-Response:",
"content": "HTTP/1.1 200 OK",
"type": "json"
}
]
},
"error": {
"fields": {
"Error 4xx": [
{
"group": "Error 4xx",
"optional": false,
"field": "Tag readerNotFound",
"description": "<p>Tag reader data is not found.</p>"
}
]
},
"examples": [
{
"title": "Error-Response:",
"content": "HTTP/1.1 403 Not Acceptable",
"type": "json"
}
]
},
"filename": "application/controllers/api/Tag reader.php",
"groupTitle": "Tag reader"
},
{
"type": "post",
"url": "/tag_reader/update",
"title": "Update Tag reader.",
"version": "0.1.0",
"name": "Updatetag_reader",
"group": "tag_reader",
"header": {
"fields": {
"Header": [
{
"group": "Header",
"type": "String",
"optional": false,
"field": "X-Api-Key",
"description": "<p>Tag readers unique access-key.</p>"
},
{
"group": "Header",
"type": "String",
"optional": false,
"field": "X-Token",
"description": "<p>Tag readers unique token.</p>"
}
]
}
},
"permission": [
{
"name": "Tag reader Cant be Accessed permission name : api_Tag reader_update"
}
],
"parameter": {
"fields": {
"Parameter": [
  {
  "group": "Parameter",
  "type": "String",
  "optional": false,
  "field": "Room_id",
  "description": "<p>Mandatory room_id of Tag readers .</p>"
  },
  {
  "group": "Parameter",
  "type": "String",
  "optional": false,
  "field": "Reader_name",
  "description": "<p>Mandatory reader_name of Tag readers Input Reader Name Max Length : 50..</p>"
  },
  {
  "group": "Parameter",
  "type": "String",
  "optional": false,
  "field": "Setfor",
  "description": "<p>Mandatory setfor of Tag readers .</p>"
  },
  {
  "group": "Parameter",
  "type": "String",
  "optional": false,
  "field": "Reader_serialnumber",
  "description": "<p>Mandatory reader_serialnumber of Tag readers Input Reader Serialnumber Max Length : 10..</p>"
  },
  {
  "group": "Parameter",
  "type": "String",
  "optional": false,
  "field": "Reader_type",
  "description": "<p>Mandatory reader_type of Tag readers .</p>"
  },
  {
  "group": "Parameter",
  "type": "String",
  "optional": false,
  "field": "Reader_ip",
  "description": "<p>Mandatory reader_ip of Tag readers Input Reader Ip Max Length : 45..</p>"
  },
  {
  "group": "Parameter",
  "type": "String",
  "optional": false,
  "field": "Reader_port",
  "description": "<p>Mandatory reader_port of Tag readers Input Reader Port Max Length : 7..</p>"
  },
  {
  "group": "Parameter",
  "type": "String",
  "optional": false,
  "field": "Reader_com",
  "description": "<p>Mandatory reader_com of Tag readers .</p>"
  },
  {
  "group": "Parameter",
  "type": "String",
  "optional": false,
  "field": "Reader_baudrate",
  "description": "<p>Mandatory reader_baudrate of Tag readers .</p>"
  },
  {
  "group": "Parameter",
  "type": "String",
  "optional": false,
  "field": "Reader_power",
  "description": "<p>Mandatory reader_power of Tag readers .</p>"
  },
  {
  "group": "Parameter",
  "type": "String",
  "optional": false,
  "field": "Reader_interval",
  "description": "<p>Mandatory reader_interval of Tag readers .</p>"
  },
  {
  "group": "Parameter",
  "type": "String",
  "optional": false,
  "field": "Reader_mode",
  "description": "<p>Mandatory reader_mode of Tag readers .</p>"
  },
  {
  "group": "Parameter",
  "type": "String",
  "optional": false,
  "field": "Reader_updatedby",
  "description": "<p>Mandatory reader_updatedby of Tag readers .</p>"
  },
  {
  "group": "Parameter",
  "type": "String",
  "optional": false,
  "field": "Reader_updated",
  "description": "<p>Mandatory reader_updated of Tag readers .</p>"
  },
  {
  "group": "Parameter",
  "type": "String",
  "optional": false,
  "field": "Reader_createdby",
  "description": "<p>Mandatory reader_createdby of Tag readers .</p>"
  },
  {
  "group": "Parameter",
  "type": "String",
  "optional": false,
  "field": "Reader_created",
  "description": "<p>Mandatory reader_created of Tag readers .</p>"
  },
  {
  "group": "Parameter",
  "type": "String",
  "optional": false,
  "field": "Reader_family",
  "description": "<p>Mandatory reader_family of Tag readers .</p>"
  },
  {
  "group": "Parameter",
  "type": "String",
  "optional": false,
  "field": "Connecting",
  "description": "<p>Mandatory connecting of Tag readers .</p>"
  },
  {
  "group": "Parameter",
  "type": "String",
  "optional": false,
  "field": "Reader_model",
  "description": "<p>Mandatory reader_model of Tag readers Input Reader Model Max Length : 50..</p>"
  },
  {
  "group": "Parameter",
  "type": "String",
  "optional": false,
  "field": "Reader_identity",
  "description": "<p>Mandatory reader_identity of Tag readers Input Reader Identity Max Length : 50..</p>"
  },
  {
  "group": "Parameter",
  "type": "String",
  "optional": false,
  "field": "Reader_antena",
  "description": "<p>Mandatory reader_antena of Tag readers .</p>"
  },
  {
  "group": "Parameter",
  "type": "String",
  "optional": false,
  "field": "Reader_angle",
  "description": "<p>Mandatory reader_angle of Tag readers .</p>"
  },
  {
  "group": "Parameter",
  "type": "String",
  "optional": false,
  "field": "Reader_gate",
  "description": "<p>Mandatory reader_gate of Tag readers Input Reader Gate Max Length : 50..</p>"
  }
]
}
},
"success": {
"fields": {
"Success 200": [
{
"group": "Success 200",
"type": "Boolean",
"optional": false,
"field": "Status",
"description": "<p>status response api.</p>"
},
{
"group": "Success 200",
"type": "String",
"optional": false,
"field": "Message",
"description": "<p>message response api.</p>"
}
]
},
"examples": [
{
"title": "Success-Response:",
"content": "HTTP/1.1 200 OK",
"type": "json"
}
]
},
"error": {
"fields": {
"Error 4xx": [
{
"group": "Error 4xx",
"optional": false,
"field": "ValidationError",
"description": "<p>Error validation.</p>"
}
]
},
"examples": [
{
"title": "Error-Response:",
"content": "HTTP/1.1 403 Not Acceptable",
"type": "json"
}
]
},
"filename": "application/controllers/api/Tag reader.php",
"groupTitle": "Tag reader"
},{
"type": "post",
"url": "/tag_temp_table/add",
"title": "Add Tag temp table.",
"version": "0.1.0",
"name": "Addtag_temp_table",
"group": "tag_temp_table",
"header": {
"fields": {
"Header": [
{
"group": "Header",
"type": "String",
"optional": false,
"field": "X-Api-Key",
"description": "<p>Tag temp table unique access-key.</p>"
}
]
}
},
"permission": [
{
"name": "Tag temp table Cant be Accessed permission name : api_tag_temp_table_add"
}
],
"parameter": {
"fields": {
"Parameter": [
  {
  "group": "Parameter",
  "type": "String",
  "optional": false,
  "field": "Lokasi_terakhir_id",
  "description": "<p>Mandatory lokasi_terakhir_id of Tag temp tables .</p>"
  },
  {
  "group": "Parameter",
  "type": "String",
  "optional": false,
  "field": "Nama_lokasi_terakhir",
  "description": "<p>Mandatory nama_lokasi_terakhir of Tag temp tables Input Nama Lokasi Terakhir Max Length : 50..</p>"
  },
  {
  "group": "Parameter",
  "type": "String",
  "optional": false,
  "field": "Room_id",
  "description": "<p>Mandatory room_id of Tag temp tables .</p>"
  },
  {
  "group": "Parameter",
  "type": "String",
  "optional": false,
  "field": "Room_name",
  "description": "<p>Mandatory room_name of Tag temp tables Input Room Name Max Length : 50..</p>"
  },
  {
  "group": "Parameter",
  "type": "String",
  "optional": false,
  "field": "Reader_id",
  "description": "<p>Mandatory reader_id of Tag temp tables .</p>"
  },
  {
  "group": "Parameter",
  "type": "String",
  "optional": false,
  "field": "Reader_antena",
  "description": "<p>Mandatory reader_antena of Tag temp tables .</p>"
  },
  {
  "group": "Parameter",
  "type": "String",
  "optional": false,
  "field": "Reader_angle",
  "description": "<p>Mandatory reader_angle of Tag temp tables .</p>"
  },
  {
  "group": "Parameter",
  "type": "String",
  "optional": false,
  "field": "Reader_gate",
  "description": "<p>Mandatory reader_gate of Tag temp tables Input Reader Gate Max Length : 50..</p>"
  },
  {
  "group": "Parameter",
  "type": "String",
  "optional": false,
  "field": "Rfid_tag_number",
  "description": "<p>Mandatory rfid_tag_number of Tag temp tables Input Rfid Tag Number Max Length : 96..</p>"
  }
]
}
},
"success": {
"fields": {
"Success 200": [
{
"group": "Success 200",
"type": "Boolean",
"optional": false,
"field": "Status",
"description": "<p>status response api.</p>"
},
{
"group": "Success 200",
"type": "String",
"optional": false,
"field": "Message",
"description": "<p>message response api.</p>"
}
]
},
"examples": [
{
"title": "Success-Response:",
"content": "HTTP/1.1 200 OK",
"type": "json"
}
]
},
"error": {
"fields": {
"Error 4xx": [
{
"group": "Error 4xx",
"optional": false,
"field": "ValidationError",
"description": "<p>Error validation.</p>"
}
]
},
"examples": [
{
"title": "Error-Response:",
"content": "HTTP/1.1 403 Not Acceptable",
"type": "json"
}
]
},
"filename": "application/controllers/api/Tag_temp_table.php",
"groupTitle": "Tag temp table"
},
{
"type": "get",
"url": "/tag_temp_table/all",
"title": "Get all Tag temp tables.",
"version": "0.1.0",
"name": "Alltag_temp_table",
"group": "tag_temp_table",
"header": {
"fields": {
"Header": [
{
"group": "Header",
"type": "String",
"optional": false,
"field": "X-Api-Key",
"description": "<p>Tag temp tables unique access-key.</p>"
},
{
"group": "Header",
"type": "String",
"optional": false,
"field": "X-Token",
"description": "<p>Tag temp tables unique token.</p>"
}
]
}
},
"permission": [
{
"name": "{} Cant be Accessed permission name : api_Tag temp table_all"
}
],
"parameter": {
"fields": {
"Parameter": [


{
"group": "Parameter",
"type": "String",
"optional": true,
"field": "Field",
"defaultValue": "All Field",
"description": "<p>Optional field of Tag temp tables.</p>"
},
{
"group": "Parameter",
"type": "String",
"optional": true,
"field": "Start",
"defaultValue": "0",
"description": "<p>Optional start index of Tag temp tables.</p>"
},
{
"group": "Parameter",
"type": "String",
"optional": true,
"field": "Limit",
"defaultValue": "10",
"description": "<p>Optional limit data of Tag temp tables.</p>"
},
{
"group": "Parameter",
"type": "String",
"optional": true,
"field": "Sort_field",
"defaultValue": "id_temp_table",
"description": "<p>Sort data by this field. id_temp_table, lokasi_terakhir_id, nama_lokasi_terakhir, room_id, room_name, reader_id, reader_antena, reader_angle, reader_gate, rfid_tag_number, waktu, output, kategori_pergerakan, keterangan_pergerakan</p>"
},
{
"group": "Parameter",
"type": "String",
"optional": true,
"field": "Sort_order",
"defaultValue": "DESC",
"description": "<p>Sort data order this field ASC or DESC.</p>"
},
{
"group": "Parameter",
"type": "String",
"optional": true,
"field": "Filters",
"defaultValue": "",
"description": "<p>filters[0][lg] = <code>AND</code>, <code>OR</code><br>filters[0][co][0][fl] = <code>id_temp_table</code><br>filters[0][co][0][op] = <code>equal</code>, <code>not_equal</code>, <code>greather</code>, <code>greather_equal</code>, <code>smaller_equal</code>, <code>smaller</code>, <code>is_null</code>, <code>not_null</code>, <code>where_in</code>, <code>where_not_in</code>, <code>like</code><br>filters[0][co][0][vl] = 1<br>filters[0][co][0][lg] = <code>OR</code>, <code>AND</code><br><br><br><span class=\"label \">Note</span> : if use like operator you need append <code>%your term%</code> on vl<br>for <code>BETWEEN</code> or <code>IN</code> you can use val1, val2, ..etc</p>"
}
]
}
},
"success": {
"fields": {
"Success 200": [
{
"group": "Success 200",
"type": "Boolean",
"optional": false,
"field": "Status",
"description": "<p>status response api.</p>"
},
{
"group": "Success 200",
"type": "String",
"optional": false,
"field": "Message",
"description": "<p>message response api.</p>"
},
{
"group": "Success 200",
"type": "Array",
"optional": false,
"field": "Data",
"description": "<p>data of Tag temp table.</p>"
}
]
},
"examples": [
{
"title": "Success-Response:",
"content": "HTTP/1.1 200 OK",
"type": "json"
}
]
},
"error": {
"fields": {
"Error 4xx": [
{
"group": "Error 4xx",
"optional": false,
"field": "NoDataTag temp table",
"description": "<p>Tag temp table data is nothing.</p>"
}
]
},
"examples": [
{
"title": "Error-Response:",
"content": "HTTP/1.1 403 Not Acceptable",
"type": "json"
}
]
},
"filename": "application/controllers/api/Tag temp table.php",
"groupTitle": "Tag temp table"
},
{
"type": "post",
"url": "/tag_temp_table/delete",
"title": "Delete Tag temp table.",
"version": "0.1.0",
"name": "Deletetag_temp_table",
"group": "tag_temp_table",
"header": {
"fields": {
"Header": [
{
"group": "Header",
"type": "String",
"optional": false,
"field": "X-Api-Key",
"description": "<p>Tag temp tables unique access-key.</p>"
},
{
"group": "Header",
"type": "String",
"optional": false,
"field": "X-Token",
"description": "<p>Tag temp tables unique token.</p>"
}
]
}
},
"permission": [
{
"name": "Tag temp table Cant be Accessed permission name : api_Tag temp table_delete"
}
],
"parameter": {
"fields": {
"Parameter": [
{
"group": "Parameter",
"type": "Integer",
"optional": false,
"field": "Id",
"description": "<p>Mandatory id of Tag temp tables .</p>"
}
]
}
},
"success": {
"fields": {
"Success 200": [
{
"group": "Success 200",
"type": "Boolean",
"optional": false,
"field": "Status",
"description": "<p>status response api.</p>"
},
{
"group": "Success 200",
"type": "String",
"optional": false,
"field": "Message",
"description": "<p>message response api.</p>"
}
]
},
"examples": [
{
"title": "Success-Response:",
"content": "HTTP/1.1 200 OK",
"type": "json"
}
]
},
"error": {
"fields": {
"Error 4xx": [
{
"group": "Error 4xx",
"optional": false,
"field": "ValidationError",
"description": "<p>Error validation.</p>"
}
]
},
"examples": [
{
"title": "Error-Response:",
"content": "HTTP/1.1 403 Not Acceptable",
"type": "json"
}
]
},
"filename": "application/controllers/api/Tag temp table.php",
"groupTitle": "Tag temp table"
},
{
"type": "get",
"url": "/tag_temp_table/detail",
"title": "Detail Tag temp table.",
"version": "0.1.0",
"name": "Detailtag_temp_table",
"group": "tag_temp_table",
"header": {
"fields": {
"Header": [
{
"group": "Header",
"type": "String",
"optional": false,
"field": "X-Api-Key",
"description": "<p>Tag temp tables unique access-key.</p>"
},
{
"group": "Header",
"type": "String",
"optional": false,
"field": "X-Token",
"description": "<p>Tag temp tables unique token.</p>"
}
]
}
},
"permission": [
{
"name": "Tag temp table Cant be Accessed permission name : api_Tag temp table_detail"
}
],
"parameter": {
"fields": {
"Parameter": [
{
"group": "Parameter",
"type": "Integer",
"optional": false,
"field": "Id",
"description": "<p>Mandatory id of Tag temp tables.</p>"
}
]
}
},
"success": {
"fields": {
"Success 200": [
{
"group": "Success 200",
"type": "Boolean",
"optional": false,
"field": "Status",
"description": "<p>status response api.</p>"
},
{
"group": "Success 200",
"type": "String",
"optional": false,
"field": "Message",
"description": "<p>message response api.</p>"
},
{
"group": "Success 200",
"type": "Array",
"optional": false,
"field": "Data",
"description": "<p>data of Tag temp table.</p>"
}
]
},
"examples": [
{
"title": "Success-Response:",
"content": "HTTP/1.1 200 OK",
"type": "json"
}
]
},
"error": {
"fields": {
"Error 4xx": [
{
"group": "Error 4xx",
"optional": false,
"field": "Tag temp tableNotFound",
"description": "<p>Tag temp table data is not found.</p>"
}
]
},
"examples": [
{
"title": "Error-Response:",
"content": "HTTP/1.1 403 Not Acceptable",
"type": "json"
}
]
},
"filename": "application/controllers/api/Tag temp table.php",
"groupTitle": "Tag temp table"
},
{
"type": "post",
"url": "/tag_temp_table/update",
"title": "Update Tag temp table.",
"version": "0.1.0",
"name": "Updatetag_temp_table",
"group": "tag_temp_table",
"header": {
"fields": {
"Header": [
{
"group": "Header",
"type": "String",
"optional": false,
"field": "X-Api-Key",
"description": "<p>Tag temp tables unique access-key.</p>"
},
{
"group": "Header",
"type": "String",
"optional": false,
"field": "X-Token",
"description": "<p>Tag temp tables unique token.</p>"
}
]
}
},
"permission": [
{
"name": "Tag temp table Cant be Accessed permission name : api_Tag temp table_update"
}
],
"parameter": {
"fields": {
"Parameter": [
  {
  "group": "Parameter",
  "type": "String",
  "optional": false,
  "field": "Lokasi_terakhir_id",
  "description": "<p>Mandatory lokasi_terakhir_id of Tag temp tables .</p>"
  },
  {
  "group": "Parameter",
  "type": "String",
  "optional": false,
  "field": "Nama_lokasi_terakhir",
  "description": "<p>Mandatory nama_lokasi_terakhir of Tag temp tables Input Nama Lokasi Terakhir Max Length : 50..</p>"
  },
  {
  "group": "Parameter",
  "type": "String",
  "optional": false,
  "field": "Room_id",
  "description": "<p>Mandatory room_id of Tag temp tables .</p>"
  },
  {
  "group": "Parameter",
  "type": "String",
  "optional": false,
  "field": "Room_name",
  "description": "<p>Mandatory room_name of Tag temp tables Input Room Name Max Length : 50..</p>"
  },
  {
  "group": "Parameter",
  "type": "String",
  "optional": false,
  "field": "Reader_id",
  "description": "<p>Mandatory reader_id of Tag temp tables .</p>"
  },
  {
  "group": "Parameter",
  "type": "String",
  "optional": false,
  "field": "Reader_antena",
  "description": "<p>Mandatory reader_antena of Tag temp tables .</p>"
  },
  {
  "group": "Parameter",
  "type": "String",
  "optional": false,
  "field": "Reader_angle",
  "description": "<p>Mandatory reader_angle of Tag temp tables .</p>"
  },
  {
  "group": "Parameter",
  "type": "String",
  "optional": false,
  "field": "Reader_gate",
  "description": "<p>Mandatory reader_gate of Tag temp tables Input Reader Gate Max Length : 50..</p>"
  },
  {
  "group": "Parameter",
  "type": "String",
  "optional": false,
  "field": "Rfid_tag_number",
  "description": "<p>Mandatory rfid_tag_number of Tag temp tables Input Rfid Tag Number Max Length : 96..</p>"
  }
]
}
},
"success": {
"fields": {
"Success 200": [
{
"group": "Success 200",
"type": "Boolean",
"optional": false,
"field": "Status",
"description": "<p>status response api.</p>"
},
{
"group": "Success 200",
"type": "String",
"optional": false,
"field": "Message",
"description": "<p>message response api.</p>"
}
]
},
"examples": [
{
"title": "Success-Response:",
"content": "HTTP/1.1 200 OK",
"type": "json"
}
]
},
"error": {
"fields": {
"Error 4xx": [
{
"group": "Error 4xx",
"optional": false,
"field": "ValidationError",
"description": "<p>Error validation.</p>"
}
]
},
"examples": [
{
"title": "Error-Response:",
"content": "HTTP/1.1 403 Not Acceptable",
"type": "json"
}
]
},
"filename": "application/controllers/api/Tag temp table.php",
"groupTitle": "Tag temp table"
},{
"type": "post",
"url": "/tb_asset_master/add",
"title": "Add Tb asset master.",
"version": "0.1.0",
"name": "Addtb_asset_master",
"group": "tb_asset_master",
"header": {
"fields": {
"Header": [
{
"group": "Header",
"type": "String",
"optional": false,
"field": "X-Api-Key",
"description": "<p>Tb asset master unique access-key.</p>"
}
]
}
},
"permission": [
{
"name": "Tb asset master Cant be Accessed permission name : api_tb_asset_master_add"
}
],
"parameter": {
"fields": {
"Parameter": [
  {
  "group": "Parameter",
  "type": "String",
  "optional": false,
  "field": "Kode_brg",
  "description": "<p>Mandatory kode_brg of Tb asset masters Input Kode Brg Max Length : 15..</p>"
  },
  {
  "group": "Parameter",
  "type": "String",
  "optional": false,
  "field": "Nup",
  "description": "<p>Mandatory nup of Tb asset masters Input Nup Max Length : 11..</p>"
  },
  {
  "group": "Parameter",
  "type": "String",
  "optional": false,
  "field": "Tag_code",
  "description": "<p>Mandatory tag_code of Tb asset masters Input Tag Code Max Length : 96..</p>"
  },
  {
  "group": "Parameter",
  "type": "String",
  "optional": false,
  "field": "Nama_brg",
  "description": "<p>Mandatory nama_brg of Tb asset masters Input Nama Brg Max Length : 200..</p>"
  },
  {
  "group": "Parameter",
  "type": "String",
  "optional": false,
  "field": "Merk",
  "description": "<p>Mandatory merk of Tb asset masters Input Merk Max Length : 50..</p>"
  },
  {
  "group": "Parameter",
  "type": "String",
  "optional": false,
  "field": "Tipe",
  "description": "<p>Mandatory tipe of Tb asset masters Input Tipe Max Length : 30..</p>"
  },
  {
  "group": "Parameter",
  "type": "String",
  "optional": false,
  "field": "Kondisi",
  "description": "<p>Mandatory kondisi of Tb asset masters .</p>"
  },
  {
  "group": "Parameter",
  "type": "String",
  "optional": false,
  "field": "Nilai",
  "description": "<p>Mandatory nilai of Tb asset masters .</p>"
  },
  {
  "group": "Parameter",
  "type": "String",
  "optional": false,
  "field": "Kelompok",
  "description": "<p>Mandatory kelompok of Tb asset masters .</p>"
  },
  {
  "group": "Parameter",
  "type": "String",
  "optional": false,
  "field": "Tgl_inventarisasi",
  "description": "<p>Mandatory tgl_inventarisasi of Tb asset masters .</p>"
  },
  {
  "group": "Parameter",
  "type": "String",
  "optional": false,
  "field": "Tglperolehan",
  "description": "<p>Mandatory tglperolehan of Tb asset masters .</p>"
  },
  {
  "group": "Parameter",
  "type": "String",
  "optional": false,
  "field": "Lokasi",
  "description": "<p>Mandatory lokasi of Tb asset masters .</p>"
  },
  {
  "group": "Parameter",
  "type": "String",
  "optional": false,
  "field": "Status_id",
  "description": "<p>Mandatory status_id of Tb asset masters .</p>"
  },
  {
  "group": "Parameter",
  "type": "String",
  "optional": false,
  "field": "Keterangan",
  "description": "<p>Mandatory keterangan of Tb asset masters Input Keterangan Max Length : 200..</p>"
  },
  {
  "group": "Parameter",
  "type": "String",
  "optional": false,
  "field": "Pic_aset",
  "description": "<p>Mandatory pic_aset of Tb asset masters .</p>"
  }
]
}
},
"success": {
"fields": {
"Success 200": [
{
"group": "Success 200",
"type": "Boolean",
"optional": false,
"field": "Status",
"description": "<p>status response api.</p>"
},
{
"group": "Success 200",
"type": "String",
"optional": false,
"field": "Message",
"description": "<p>message response api.</p>"
}
]
},
"examples": [
{
"title": "Success-Response:",
"content": "HTTP/1.1 200 OK",
"type": "json"
}
]
},
"error": {
"fields": {
"Error 4xx": [
{
"group": "Error 4xx",
"optional": false,
"field": "ValidationError",
"description": "<p>Error validation.</p>"
}
]
},
"examples": [
{
"title": "Error-Response:",
"content": "HTTP/1.1 403 Not Acceptable",
"type": "json"
}
]
},
"filename": "application/controllers/api/Tb_asset_master.php",
"groupTitle": "Tb asset master"
},
{
"type": "get",
"url": "/tb_asset_master/all",
"title": "Get all Tb asset masters.",
"version": "0.1.0",
"name": "Alltb_asset_master",
"group": "tb_asset_master",
"header": {
"fields": {
"Header": [
{
"group": "Header",
"type": "String",
"optional": false,
"field": "X-Api-Key",
"description": "<p>Tb asset masters unique access-key.</p>"
},
{
"group": "Header",
"type": "String",
"optional": false,
"field": "X-Token",
"description": "<p>Tb asset masters unique token.</p>"
}
]
}
},
"permission": [
{
"name": "{} Cant be Accessed permission name : api_Tb asset master_all"
}
],
"parameter": {
"fields": {
"Parameter": [


{
"group": "Parameter",
"type": "String",
"optional": true,
"field": "Field",
"defaultValue": "All Field",
"description": "<p>Optional field of Tb asset masters.</p>"
},
{
"group": "Parameter",
"type": "String",
"optional": true,
"field": "Start",
"defaultValue": "0",
"description": "<p>Optional start index of Tb asset masters.</p>"
},
{
"group": "Parameter",
"type": "String",
"optional": true,
"field": "Limit",
"defaultValue": "10",
"description": "<p>Optional limit data of Tb asset masters.</p>"
},
{
"group": "Parameter",
"type": "String",
"optional": true,
"field": "Sort_field",
"defaultValue": "id",
"description": "<p>Sort data by this field. id, kode_brg, nup, tag_code, nama_brg, merk, tipe, kondisi, nilai, kelompok, tgl_inventarisasi, tglperolehan, lokasi, status_id, keterangan, pic_aset</p>"
},
{
"group": "Parameter",
"type": "String",
"optional": true,
"field": "Sort_order",
"defaultValue": "DESC",
"description": "<p>Sort data order this field ASC or DESC.</p>"
},
{
"group": "Parameter",
"type": "String",
"optional": true,
"field": "Filters",
"defaultValue": "",
"description": "<p>filters[0][lg] = <code>AND</code>, <code>OR</code><br>filters[0][co][0][fl] = <code>id</code><br>filters[0][co][0][op] = <code>equal</code>, <code>not_equal</code>, <code>greather</code>, <code>greather_equal</code>, <code>smaller_equal</code>, <code>smaller</code>, <code>is_null</code>, <code>not_null</code>, <code>where_in</code>, <code>where_not_in</code>, <code>like</code><br>filters[0][co][0][vl] = 1<br>filters[0][co][0][lg] = <code>OR</code>, <code>AND</code><br><br><br><span class=\"label \">Note</span> : if use like operator you need append <code>%your term%</code> on vl<br>for <code>BETWEEN</code> or <code>IN</code> you can use val1, val2, ..etc</p>"
}
]
}
},
"success": {
"fields": {
"Success 200": [
{
"group": "Success 200",
"type": "Boolean",
"optional": false,
"field": "Status",
"description": "<p>status response api.</p>"
},
{
"group": "Success 200",
"type": "String",
"optional": false,
"field": "Message",
"description": "<p>message response api.</p>"
},
{
"group": "Success 200",
"type": "Array",
"optional": false,
"field": "Data",
"description": "<p>data of Tb asset master.</p>"
}
]
},
"examples": [
{
"title": "Success-Response:",
"content": "HTTP/1.1 200 OK",
"type": "json"
}
]
},
"error": {
"fields": {
"Error 4xx": [
{
"group": "Error 4xx",
"optional": false,
"field": "NoDataTb asset master",
"description": "<p>Tb asset master data is nothing.</p>"
}
]
},
"examples": [
{
"title": "Error-Response:",
"content": "HTTP/1.1 403 Not Acceptable",
"type": "json"
}
]
},
"filename": "application/controllers/api/Tb asset master.php",
"groupTitle": "Tb asset master"
},
{
"type": "post",
"url": "/tb_asset_master/delete",
"title": "Delete Tb asset master.",
"version": "0.1.0",
"name": "Deletetb_asset_master",
"group": "tb_asset_master",
"header": {
"fields": {
"Header": [
{
"group": "Header",
"type": "String",
"optional": false,
"field": "X-Api-Key",
"description": "<p>Tb asset masters unique access-key.</p>"
},
{
"group": "Header",
"type": "String",
"optional": false,
"field": "X-Token",
"description": "<p>Tb asset masters unique token.</p>"
}
]
}
},
"permission": [
{
"name": "Tb asset master Cant be Accessed permission name : api_Tb asset master_delete"
}
],
"parameter": {
"fields": {
"Parameter": [
{
"group": "Parameter",
"type": "Integer",
"optional": false,
"field": "Id",
"description": "<p>Mandatory id of Tb asset masters .</p>"
}
]
}
},
"success": {
"fields": {
"Success 200": [
{
"group": "Success 200",
"type": "Boolean",
"optional": false,
"field": "Status",
"description": "<p>status response api.</p>"
},
{
"group": "Success 200",
"type": "String",
"optional": false,
"field": "Message",
"description": "<p>message response api.</p>"
}
]
},
"examples": [
{
"title": "Success-Response:",
"content": "HTTP/1.1 200 OK",
"type": "json"
}
]
},
"error": {
"fields": {
"Error 4xx": [
{
"group": "Error 4xx",
"optional": false,
"field": "ValidationError",
"description": "<p>Error validation.</p>"
}
]
},
"examples": [
{
"title": "Error-Response:",
"content": "HTTP/1.1 403 Not Acceptable",
"type": "json"
}
]
},
"filename": "application/controllers/api/Tb asset master.php",
"groupTitle": "Tb asset master"
},
{
"type": "get",
"url": "/tb_asset_master/detail",
"title": "Detail Tb asset master.",
"version": "0.1.0",
"name": "Detailtb_asset_master",
"group": "tb_asset_master",
"header": {
"fields": {
"Header": [
{
"group": "Header",
"type": "String",
"optional": false,
"field": "X-Api-Key",
"description": "<p>Tb asset masters unique access-key.</p>"
},
{
"group": "Header",
"type": "String",
"optional": false,
"field": "X-Token",
"description": "<p>Tb asset masters unique token.</p>"
}
]
}
},
"permission": [
{
"name": "Tb asset master Cant be Accessed permission name : api_Tb asset master_detail"
}
],
"parameter": {
"fields": {
"Parameter": [
{
"group": "Parameter",
"type": "Integer",
"optional": false,
"field": "Id",
"description": "<p>Mandatory id of Tb asset masters.</p>"
}
]
}
},
"success": {
"fields": {
"Success 200": [
{
"group": "Success 200",
"type": "Boolean",
"optional": false,
"field": "Status",
"description": "<p>status response api.</p>"
},
{
"group": "Success 200",
"type": "String",
"optional": false,
"field": "Message",
"description": "<p>message response api.</p>"
},
{
"group": "Success 200",
"type": "Array",
"optional": false,
"field": "Data",
"description": "<p>data of Tb asset master.</p>"
}
]
},
"examples": [
{
"title": "Success-Response:",
"content": "HTTP/1.1 200 OK",
"type": "json"
}
]
},
"error": {
"fields": {
"Error 4xx": [
{
"group": "Error 4xx",
"optional": false,
"field": "Tb asset masterNotFound",
"description": "<p>Tb asset master data is not found.</p>"
}
]
},
"examples": [
{
"title": "Error-Response:",
"content": "HTTP/1.1 403 Not Acceptable",
"type": "json"
}
]
},
"filename": "application/controllers/api/Tb asset master.php",
"groupTitle": "Tb asset master"
},
{
"type": "post",
"url": "/tb_asset_master/update",
"title": "Update Tb asset master.",
"version": "0.1.0",
"name": "Updatetb_asset_master",
"group": "tb_asset_master",
"header": {
"fields": {
"Header": [
{
"group": "Header",
"type": "String",
"optional": false,
"field": "X-Api-Key",
"description": "<p>Tb asset masters unique access-key.</p>"
},
{
"group": "Header",
"type": "String",
"optional": false,
"field": "X-Token",
"description": "<p>Tb asset masters unique token.</p>"
}
]
}
},
"permission": [
{
"name": "Tb asset master Cant be Accessed permission name : api_Tb asset master_update"
}
],
"parameter": {
"fields": {
"Parameter": [
  {
  "group": "Parameter",
  "type": "String",
  "optional": false,
  "field": "Kode_brg",
  "description": "<p>Mandatory kode_brg of Tb asset masters Input Kode Brg Max Length : 15..</p>"
  },
  {
  "group": "Parameter",
  "type": "String",
  "optional": false,
  "field": "Nup",
  "description": "<p>Mandatory nup of Tb asset masters Input Nup Max Length : 11..</p>"
  },
  {
  "group": "Parameter",
  "type": "String",
  "optional": false,
  "field": "Tag_code",
  "description": "<p>Mandatory tag_code of Tb asset masters Input Tag Code Max Length : 96..</p>"
  },
  {
  "group": "Parameter",
  "type": "String",
  "optional": false,
  "field": "Nama_brg",
  "description": "<p>Mandatory nama_brg of Tb asset masters Input Nama Brg Max Length : 200..</p>"
  },
  {
  "group": "Parameter",
  "type": "String",
  "optional": false,
  "field": "Merk",
  "description": "<p>Mandatory merk of Tb asset masters Input Merk Max Length : 50..</p>"
  },
  {
  "group": "Parameter",
  "type": "String",
  "optional": false,
  "field": "Tipe",
  "description": "<p>Mandatory tipe of Tb asset masters Input Tipe Max Length : 30..</p>"
  },
  {
  "group": "Parameter",
  "type": "String",
  "optional": false,
  "field": "Kondisi",
  "description": "<p>Mandatory kondisi of Tb asset masters .</p>"
  },
  {
  "group": "Parameter",
  "type": "String",
  "optional": false,
  "field": "Nilai",
  "description": "<p>Mandatory nilai of Tb asset masters .</p>"
  },
  {
  "group": "Parameter",
  "type": "String",
  "optional": false,
  "field": "Kelompok",
  "description": "<p>Mandatory kelompok of Tb asset masters .</p>"
  },
  {
  "group": "Parameter",
  "type": "String",
  "optional": false,
  "field": "Tgl_inventarisasi",
  "description": "<p>Mandatory tgl_inventarisasi of Tb asset masters .</p>"
  },
  {
  "group": "Parameter",
  "type": "String",
  "optional": false,
  "field": "Tglperolehan",
  "description": "<p>Mandatory tglperolehan of Tb asset masters .</p>"
  },
  {
  "group": "Parameter",
  "type": "String",
  "optional": false,
  "field": "Lokasi",
  "description": "<p>Mandatory lokasi of Tb asset masters .</p>"
  },
  {
  "group": "Parameter",
  "type": "String",
  "optional": false,
  "field": "Status_id",
  "description": "<p>Mandatory status_id of Tb asset masters .</p>"
  },
  {
  "group": "Parameter",
  "type": "String",
  "optional": false,
  "field": "Keterangan",
  "description": "<p>Mandatory keterangan of Tb asset masters Input Keterangan Max Length : 200..</p>"
  },
  {
  "group": "Parameter",
  "type": "String",
  "optional": false,
  "field": "Pic_aset",
  "description": "<p>Mandatory pic_aset of Tb asset masters .</p>"
  }
]
}
},
"success": {
"fields": {
"Success 200": [
{
"group": "Success 200",
"type": "Boolean",
"optional": false,
"field": "Status",
"description": "<p>status response api.</p>"
},
{
"group": "Success 200",
"type": "String",
"optional": false,
"field": "Message",
"description": "<p>message response api.</p>"
}
]
},
"examples": [
{
"title": "Success-Response:",
"content": "HTTP/1.1 200 OK",
"type": "json"
}
]
},
"error": {
"fields": {
"Error 4xx": [
{
"group": "Error 4xx",
"optional": false,
"field": "ValidationError",
"description": "<p>Error validation.</p>"
}
]
},
"examples": [
{
"title": "Error-Response:",
"content": "HTTP/1.1 403 Not Acceptable",
"type": "json"
}
]
},
"filename": "application/controllers/api/Tb asset master.php",
"groupTitle": "Tb asset master"
},{
"type": "post",
"url": "/tb_master_aset/add",
"title": "Add Tb master aset.",
"version": "0.1.0",
"name": "Addtb_master_aset",
"group": "tb_master_aset",
"header": {
"fields": {
"Header": [
{
"group": "Header",
"type": "String",
"optional": false,
"field": "X-Api-Key",
"description": "<p>Tb master aset unique access-key.</p>"
}
]
}
},
"permission": [
{
"name": "Tb master aset Cant be Accessed permission name : api_tb_master_aset_add"
}
],
"parameter": {
"fields": {
"Parameter": [
  {
  "group": "Parameter",
  "type": "String",
  "optional": false,
  "field": "Kode_tid",
  "description": "<p>Mandatory kode_tid of Tb master asets Input Kode Tid Max Length : 50..</p>"
  },
  {
  "group": "Parameter",
  "type": "String",
  "optional": false,
  "field": "Kode_aset",
  "description": "<p>Mandatory kode_aset of Tb master asets Input Kode Aset Max Length : 255..</p>"
  },
  {
  "group": "Parameter",
  "type": "String",
  "optional": false,
  "field": "Nup",
  "description": "<p>Mandatory nup of Tb master asets .</p>"
  },
  {
  "group": "Parameter",
  "type": "String",
  "optional": false,
  "field": "Kategori",
  "description": "<p>Mandatory kategori of Tb master asets .</p>"
  },
  {
  "group": "Parameter",
  "type": "String",
  "optional": false,
  "field": "Merk",
  "description": "<p>Mandatory merk of Tb master asets Input Merk Max Length : 100..</p>"
  },
  {
  "group": "Parameter",
  "type": "String",
  "optional": false,
  "field": "Tipe",
  "description": "<p>Mandatory tipe of Tb master asets Input Tipe Max Length : 100..</p>"
  },
  {
  "group": "Parameter",
  "type": "String",
  "optional": false,
  "field": "Kondisi",
  "description": "<p>Mandatory kondisi of Tb master asets .</p>"
  },
  {
  "group": "Parameter",
  "type": "String",
  "optional": false,
  "field": "Status",
  "description": "<p>Mandatory status of Tb master asets .</p>"
  },
  {
  "group": "Parameter",
  "type": "String",
  "optional": false,
  "field": "Borrow",
  "description": "<p>Mandatory borrow of Tb master asets .</p>"
  },
  {
  "group": "Parameter",
  "type": "String",
  "optional": false,
  "field": "Tipe_moving",
  "description": "<p>Mandatory tipe_moving of Tb master asets .</p>"
  },
  {
  "group": "Parameter",
  "type": "String",
  "optional": false,
  "field": "Nama_aset",
  "description": "<p>Mandatory nama_aset of Tb master asets Input Nama Aset Max Length : 100..</p>"
  },
  {
  "group": "Parameter",
  "type": "String",
  "optional": false,
  "field": "Id_area",
  "description": "<p>Mandatory id_area of Tb master asets .</p>"
  },
  {
  "group": "Parameter",
  "type": "String",
  "optional": false,
  "field": "Id_gedung",
  "description": "<p>Mandatory id_gedung of Tb master asets .</p>"
  },
  {
  "group": "Parameter",
  "type": "String",
  "optional": false,
  "field": "Id_lokasi",
  "description": "<p>Mandatory id_lokasi of Tb master asets .</p>"
  },
  {
  "group": "Parameter",
  "type": "String",
  "optional": false,
  "field": "Tgl_perolehan",
  "description": "<p>Mandatory tgl_perolehan of Tb master asets .</p>"
  },
  {
  "group": "Parameter",
  "type": "String",
  "optional": false,
  "field": "Nilai_perolehan",
  "description": "<p>Mandatory nilai_perolehan of Tb master asets .</p>"
  },
  {
  "group": "Parameter",
  "type": "String",
  "optional": false,
  "field": "Tgl_inventarisasi",
  "description": "<p>Mandatory tgl_inventarisasi of Tb master asets .</p>"
  },
  {
  "group": "Parameter",
  "type": "String",
  "optional": false,
  "field": "Tgl_peminjaman",
  "description": "<p>Mandatory tgl_peminjaman of Tb master asets .</p>"
  },
  {
  "group": "Parameter",
  "type": "String",
  "optional": false,
  "field": "Tgl_pengembalian",
  "description": "<p>Mandatory tgl_pengembalian of Tb master asets .</p>"
  },
  {
  "group": "Parameter",
  "type": "String",
  "optional": false,
  "field": "Flag_inventarisasi",
  "description": "<p>Mandatory flag_inventarisasi of Tb master asets .</p>"
  },
  {
  "group": "Parameter",
  "type": "String",
  "optional": false,
  "field": "Id_peminjam",
  "description": "<p>Mandatory id_peminjam of Tb master asets .</p>"
  },
  {
  "group": "Parameter",
  "type": "String",
  "optional": false,
  "field": "Lokasi_moving",
  "description": "<p>Mandatory lokasi_moving of Tb master asets .</p>"
  },
  {
  "group": "Parameter",
  "type": "String",
  "optional": false,
  "field": "Lokasi_terakhir",
  "description": "<p>Mandatory lokasi_terakhir of Tb master asets .</p>"
  },
  {
  "group": "Parameter",
  "type": "String",
  "optional": false,
  "field": "Nama_lokasi_terakhir",
  "description": "<p>Mandatory nama_lokasi_terakhir of Tb master asets Input Nama Lokasi Terakhir Max Length : 100..</p>"
  },
  {
  "group": "Parameter",
  "type": "String",
  "optional": false,
  "field": "Id_pegawai",
  "description": "<p>Mandatory id_pegawai of Tb master asets .</p>"
  },
  {
  "group": "Parameter",
  "type": "String",
  "optional": false,
  "field": "Image_uri",
  "description": "<p>Mandatory image_uri of Tb master asets Input Image Uri Max Length : 255..</p>"
  },
  {
  "group": "Parameter",
  "type": "String",
  "optional": false,
  "field": "Id_transaksi",
  "description": "<p>Mandatory id_transaksi of Tb master asets .</p>"
  },
  {
  "group": "Parameter",
  "type": "String",
  "optional": false,
  "field": "No_batch_sensus",
  "description": "<p>Mandatory no_batch_sensus of Tb master asets Input No Batch Sensus Max Length : 50..</p>"
  },
  {
  "group": "Parameter",
  "type": "String",
  "optional": false,
  "field": "Keterangan",
  "description": "<p>Mandatory keterangan of Tb master asets Input Keterangan Max Length : 255..</p>"
  }
]
}
},
"success": {
"fields": {
"Success 200": [
{
"group": "Success 200",
"type": "Boolean",
"optional": false,
"field": "Status",
"description": "<p>status response api.</p>"
},
{
"group": "Success 200",
"type": "String",
"optional": false,
"field": "Message",
"description": "<p>message response api.</p>"
}
]
},
"examples": [
{
"title": "Success-Response:",
"content": "HTTP/1.1 200 OK",
"type": "json"
}
]
},
"error": {
"fields": {
"Error 4xx": [
{
"group": "Error 4xx",
"optional": false,
"field": "ValidationError",
"description": "<p>Error validation.</p>"
}
]
},
"examples": [
{
"title": "Error-Response:",
"content": "HTTP/1.1 403 Not Acceptable",
"type": "json"
}
]
},
"filename": "application/controllers/api/Tb_master_aset.php",
"groupTitle": "Tb master aset"
},
{
"type": "get",
"url": "/tb_master_aset/all",
"title": "Get all Tb master asets.",
"version": "0.1.0",
"name": "Alltb_master_aset",
"group": "tb_master_aset",
"header": {
"fields": {
"Header": [
{
"group": "Header",
"type": "String",
"optional": false,
"field": "X-Api-Key",
"description": "<p>Tb master asets unique access-key.</p>"
},
{
"group": "Header",
"type": "String",
"optional": false,
"field": "X-Token",
"description": "<p>Tb master asets unique token.</p>"
}
]
}
},
"permission": [
{
"name": "{} Cant be Accessed permission name : api_Tb master aset_all"
}
],
"parameter": {
"fields": {
"Parameter": [


{
"group": "Parameter",
"type": "String",
"optional": true,
"field": "Field",
"defaultValue": "All Field",
"description": "<p>Optional field of Tb master asets.</p>"
},
{
"group": "Parameter",
"type": "String",
"optional": true,
"field": "Start",
"defaultValue": "0",
"description": "<p>Optional start index of Tb master asets.</p>"
},
{
"group": "Parameter",
"type": "String",
"optional": true,
"field": "Limit",
"defaultValue": "10",
"description": "<p>Optional limit data of Tb master asets.</p>"
},
{
"group": "Parameter",
"type": "String",
"optional": true,
"field": "Sort_field",
"defaultValue": "id_aset",
"description": "<p>Sort data by this field. id_aset, kode_tid, kode_aset, nup, kategori, merk, tipe, kondisi, status, borrow, tipe_moving, nama_aset, id_area, id_gedung, id_lokasi, tgl_perolehan, nilai_perolehan, tgl_inventarisasi, tgl_peminjaman, tgl_pengembalian, flag_inventarisasi, id_peminjam, lokasi_moving, lokasi_terakhir, nama_lokasi_terakhir, id_pegawai, image_uri, id_transaksi, no_batch_sensus, keterangan</p>"
},
{
"group": "Parameter",
"type": "String",
"optional": true,
"field": "Sort_order",
"defaultValue": "DESC",
"description": "<p>Sort data order this field ASC or DESC.</p>"
},
{
"group": "Parameter",
"type": "String",
"optional": true,
"field": "Filters",
"defaultValue": "",
"description": "<p>filters[0][lg] = <code>AND</code>, <code>OR</code><br>filters[0][co][0][fl] = <code>id_aset</code><br>filters[0][co][0][op] = <code>equal</code>, <code>not_equal</code>, <code>greather</code>, <code>greather_equal</code>, <code>smaller_equal</code>, <code>smaller</code>, <code>is_null</code>, <code>not_null</code>, <code>where_in</code>, <code>where_not_in</code>, <code>like</code><br>filters[0][co][0][vl] = 1<br>filters[0][co][0][lg] = <code>OR</code>, <code>AND</code><br><br><br><span class=\"label \">Note</span> : if use like operator you need append <code>%your term%</code> on vl<br>for <code>BETWEEN</code> or <code>IN</code> you can use val1, val2, ..etc</p>"
}
]
}
},
"success": {
"fields": {
"Success 200": [
{
"group": "Success 200",
"type": "Boolean",
"optional": false,
"field": "Status",
"description": "<p>status response api.</p>"
},
{
"group": "Success 200",
"type": "String",
"optional": false,
"field": "Message",
"description": "<p>message response api.</p>"
},
{
"group": "Success 200",
"type": "Array",
"optional": false,
"field": "Data",
"description": "<p>data of Tb master aset.</p>"
}
]
},
"examples": [
{
"title": "Success-Response:",
"content": "HTTP/1.1 200 OK",
"type": "json"
}
]
},
"error": {
"fields": {
"Error 4xx": [
{
"group": "Error 4xx",
"optional": false,
"field": "NoDataTb master aset",
"description": "<p>Tb master aset data is nothing.</p>"
}
]
},
"examples": [
{
"title": "Error-Response:",
"content": "HTTP/1.1 403 Not Acceptable",
"type": "json"
}
]
},
"filename": "application/controllers/api/Tb master aset.php",
"groupTitle": "Tb master aset"
},
{
"type": "post",
"url": "/tb_master_aset/delete",
"title": "Delete Tb master aset.",
"version": "0.1.0",
"name": "Deletetb_master_aset",
"group": "tb_master_aset",
"header": {
"fields": {
"Header": [
{
"group": "Header",
"type": "String",
"optional": false,
"field": "X-Api-Key",
"description": "<p>Tb master asets unique access-key.</p>"
},
{
"group": "Header",
"type": "String",
"optional": false,
"field": "X-Token",
"description": "<p>Tb master asets unique token.</p>"
}
]
}
},
"permission": [
{
"name": "Tb master aset Cant be Accessed permission name : api_Tb master aset_delete"
}
],
"parameter": {
"fields": {
"Parameter": [
{
"group": "Parameter",
"type": "Integer",
"optional": false,
"field": "Id",
"description": "<p>Mandatory id of Tb master asets .</p>"
}
]
}
},
"success": {
"fields": {
"Success 200": [
{
"group": "Success 200",
"type": "Boolean",
"optional": false,
"field": "Status",
"description": "<p>status response api.</p>"
},
{
"group": "Success 200",
"type": "String",
"optional": false,
"field": "Message",
"description": "<p>message response api.</p>"
}
]
},
"examples": [
{
"title": "Success-Response:",
"content": "HTTP/1.1 200 OK",
"type": "json"
}
]
},
"error": {
"fields": {
"Error 4xx": [
{
"group": "Error 4xx",
"optional": false,
"field": "ValidationError",
"description": "<p>Error validation.</p>"
}
]
},
"examples": [
{
"title": "Error-Response:",
"content": "HTTP/1.1 403 Not Acceptable",
"type": "json"
}
]
},
"filename": "application/controllers/api/Tb master aset.php",
"groupTitle": "Tb master aset"
},
{
"type": "get",
"url": "/tb_master_aset/detail",
"title": "Detail Tb master aset.",
"version": "0.1.0",
"name": "Detailtb_master_aset",
"group": "tb_master_aset",
"header": {
"fields": {
"Header": [
{
"group": "Header",
"type": "String",
"optional": false,
"field": "X-Api-Key",
"description": "<p>Tb master asets unique access-key.</p>"
},
{
"group": "Header",
"type": "String",
"optional": false,
"field": "X-Token",
"description": "<p>Tb master asets unique token.</p>"
}
]
}
},
"permission": [
{
"name": "Tb master aset Cant be Accessed permission name : api_Tb master aset_detail"
}
],
"parameter": {
"fields": {
"Parameter": [
{
"group": "Parameter",
"type": "Integer",
"optional": false,
"field": "Id",
"description": "<p>Mandatory id of Tb master asets.</p>"
}
]
}
},
"success": {
"fields": {
"Success 200": [
{
"group": "Success 200",
"type": "Boolean",
"optional": false,
"field": "Status",
"description": "<p>status response api.</p>"
},
{
"group": "Success 200",
"type": "String",
"optional": false,
"field": "Message",
"description": "<p>message response api.</p>"
},
{
"group": "Success 200",
"type": "Array",
"optional": false,
"field": "Data",
"description": "<p>data of Tb master aset.</p>"
}
]
},
"examples": [
{
"title": "Success-Response:",
"content": "HTTP/1.1 200 OK",
"type": "json"
}
]
},
"error": {
"fields": {
"Error 4xx": [
{
"group": "Error 4xx",
"optional": false,
"field": "Tb master asetNotFound",
"description": "<p>Tb master aset data is not found.</p>"
}
]
},
"examples": [
{
"title": "Error-Response:",
"content": "HTTP/1.1 403 Not Acceptable",
"type": "json"
}
]
},
"filename": "application/controllers/api/Tb master aset.php",
"groupTitle": "Tb master aset"
},
{
"type": "post",
"url": "/tb_master_aset/update",
"title": "Update Tb master aset.",
"version": "0.1.0",
"name": "Updatetb_master_aset",
"group": "tb_master_aset",
"header": {
"fields": {
"Header": [
{
"group": "Header",
"type": "String",
"optional": false,
"field": "X-Api-Key",
"description": "<p>Tb master asets unique access-key.</p>"
},
{
"group": "Header",
"type": "String",
"optional": false,
"field": "X-Token",
"description": "<p>Tb master asets unique token.</p>"
}
]
}
},
"permission": [
{
"name": "Tb master aset Cant be Accessed permission name : api_Tb master aset_update"
}
],
"parameter": {
"fields": {
"Parameter": [
  {
  "group": "Parameter",
  "type": "String",
  "optional": false,
  "field": "Kode_tid",
  "description": "<p>Mandatory kode_tid of Tb master asets Input Kode Tid Max Length : 50..</p>"
  },
  {
  "group": "Parameter",
  "type": "String",
  "optional": false,
  "field": "Kode_aset",
  "description": "<p>Mandatory kode_aset of Tb master asets Input Kode Aset Max Length : 255..</p>"
  },
  {
  "group": "Parameter",
  "type": "String",
  "optional": false,
  "field": "Nup",
  "description": "<p>Mandatory nup of Tb master asets .</p>"
  },
  {
  "group": "Parameter",
  "type": "String",
  "optional": false,
  "field": "Kategori",
  "description": "<p>Mandatory kategori of Tb master asets .</p>"
  },
  {
  "group": "Parameter",
  "type": "String",
  "optional": false,
  "field": "Merk",
  "description": "<p>Mandatory merk of Tb master asets Input Merk Max Length : 100..</p>"
  },
  {
  "group": "Parameter",
  "type": "String",
  "optional": false,
  "field": "Tipe",
  "description": "<p>Mandatory tipe of Tb master asets Input Tipe Max Length : 100..</p>"
  },
  {
  "group": "Parameter",
  "type": "String",
  "optional": false,
  "field": "Kondisi",
  "description": "<p>Mandatory kondisi of Tb master asets .</p>"
  },
  {
  "group": "Parameter",
  "type": "String",
  "optional": false,
  "field": "Status",
  "description": "<p>Mandatory status of Tb master asets .</p>"
  },
  {
  "group": "Parameter",
  "type": "String",
  "optional": false,
  "field": "Borrow",
  "description": "<p>Mandatory borrow of Tb master asets .</p>"
  },
  {
  "group": "Parameter",
  "type": "String",
  "optional": false,
  "field": "Tipe_moving",
  "description": "<p>Mandatory tipe_moving of Tb master asets .</p>"
  },
  {
  "group": "Parameter",
  "type": "String",
  "optional": false,
  "field": "Nama_aset",
  "description": "<p>Mandatory nama_aset of Tb master asets Input Nama Aset Max Length : 100..</p>"
  },
  {
  "group": "Parameter",
  "type": "String",
  "optional": false,
  "field": "Id_area",
  "description": "<p>Mandatory id_area of Tb master asets .</p>"
  },
  {
  "group": "Parameter",
  "type": "String",
  "optional": false,
  "field": "Id_gedung",
  "description": "<p>Mandatory id_gedung of Tb master asets .</p>"
  },
  {
  "group": "Parameter",
  "type": "String",
  "optional": false,
  "field": "Id_lokasi",
  "description": "<p>Mandatory id_lokasi of Tb master asets .</p>"
  },
  {
  "group": "Parameter",
  "type": "String",
  "optional": false,
  "field": "Tgl_perolehan",
  "description": "<p>Mandatory tgl_perolehan of Tb master asets .</p>"
  },
  {
  "group": "Parameter",
  "type": "String",
  "optional": false,
  "field": "Nilai_perolehan",
  "description": "<p>Mandatory nilai_perolehan of Tb master asets .</p>"
  },
  {
  "group": "Parameter",
  "type": "String",
  "optional": false,
  "field": "Tgl_inventarisasi",
  "description": "<p>Mandatory tgl_inventarisasi of Tb master asets .</p>"
  },
  {
  "group": "Parameter",
  "type": "String",
  "optional": false,
  "field": "Tgl_peminjaman",
  "description": "<p>Mandatory tgl_peminjaman of Tb master asets .</p>"
  },
  {
  "group": "Parameter",
  "type": "String",
  "optional": false,
  "field": "Tgl_pengembalian",
  "description": "<p>Mandatory tgl_pengembalian of Tb master asets .</p>"
  },
  {
  "group": "Parameter",
  "type": "String",
  "optional": false,
  "field": "Flag_inventarisasi",
  "description": "<p>Mandatory flag_inventarisasi of Tb master asets .</p>"
  },
  {
  "group": "Parameter",
  "type": "String",
  "optional": false,
  "field": "Id_peminjam",
  "description": "<p>Mandatory id_peminjam of Tb master asets .</p>"
  },
  {
  "group": "Parameter",
  "type": "String",
  "optional": false,
  "field": "Lokasi_moving",
  "description": "<p>Mandatory lokasi_moving of Tb master asets .</p>"
  },
  {
  "group": "Parameter",
  "type": "String",
  "optional": false,
  "field": "Lokasi_terakhir",
  "description": "<p>Mandatory lokasi_terakhir of Tb master asets .</p>"
  },
  {
  "group": "Parameter",
  "type": "String",
  "optional": false,
  "field": "Nama_lokasi_terakhir",
  "description": "<p>Mandatory nama_lokasi_terakhir of Tb master asets Input Nama Lokasi Terakhir Max Length : 100..</p>"
  },
  {
  "group": "Parameter",
  "type": "String",
  "optional": false,
  "field": "Id_pegawai",
  "description": "<p>Mandatory id_pegawai of Tb master asets .</p>"
  },
  {
  "group": "Parameter",
  "type": "String",
  "optional": false,
  "field": "Image_uri",
  "description": "<p>Mandatory image_uri of Tb master asets Input Image Uri Max Length : 255..</p>"
  },
  {
  "group": "Parameter",
  "type": "String",
  "optional": false,
  "field": "Id_transaksi",
  "description": "<p>Mandatory id_transaksi of Tb master asets .</p>"
  },
  {
  "group": "Parameter",
  "type": "String",
  "optional": false,
  "field": "No_batch_sensus",
  "description": "<p>Mandatory no_batch_sensus of Tb master asets Input No Batch Sensus Max Length : 50..</p>"
  },
  {
  "group": "Parameter",
  "type": "String",
  "optional": false,
  "field": "Keterangan",
  "description": "<p>Mandatory keterangan of Tb master asets Input Keterangan Max Length : 255..</p>"
  }
]
}
},
"success": {
"fields": {
"Success 200": [
{
"group": "Success 200",
"type": "Boolean",
"optional": false,
"field": "Status",
"description": "<p>status response api.</p>"
},
{
"group": "Success 200",
"type": "String",
"optional": false,
"field": "Message",
"description": "<p>message response api.</p>"
}
]
},
"examples": [
{
"title": "Success-Response:",
"content": "HTTP/1.1 200 OK",
"type": "json"
}
]
},
"error": {
"fields": {
"Error 4xx": [
{
"group": "Error 4xx",
"optional": false,
"field": "ValidationError",
"description": "<p>Error validation.</p>"
}
]
},
"examples": [
{
"title": "Error-Response:",
"content": "HTTP/1.1 403 Not Acceptable",
"type": "json"
}
]
},
"filename": "application/controllers/api/Tb master aset.php",
"groupTitle": "Tb master aset"
},{
"type": "post",
"url": "/tb_room_master/add",
"title": "Add Tb room master.",
"version": "0.1.0",
"name": "Addtb_room_master",
"group": "tb_room_master",
"header": {
"fields": {
"Header": [
{
"group": "Header",
"type": "String",
"optional": false,
"field": "X-Api-Key",
"description": "<p>Tb room master unique access-key.</p>"
}
]
}
},
"permission": [
{
"name": "Tb room master Cant be Accessed permission name : api_tb_room_master_add"
}
],
"parameter": {
"fields": {
"Parameter": [
  {
  "group": "Parameter",
  "type": "String",
  "optional": false,
  "field": "Gedung_id",
  "description": "<p>Mandatory gedung_id of Tb room masters .</p>"
  },
  {
  "group": "Parameter",
  "type": "String",
  "optional": false,
  "field": "Kode_room",
  "description": "<p>Mandatory kode_room of Tb room masters Input Kode Room Max Length : 30..</p>"
  },
  {
  "group": "Parameter",
  "type": "String",
  "optional": false,
  "field": "Name_room",
  "description": "<p>Mandatory name_room of Tb room masters Input Name Room Max Length : 30..</p>"
  },
  {
  "group": "Parameter",
  "type": "String",
  "optional": false,
  "field": "Lat",
  "description": "<p>Mandatory lat of Tb room masters .</p>"
  },
  {
  "group": "Parameter",
  "type": "String",
  "optional": false,
  "field": "Long",
  "description": "<p>Mandatory long of Tb room masters .</p>"
  },
  {
  "group": "Parameter",
  "type": "String",
  "optional": false,
  "field": "Pic",
  "description": "<p>Mandatory pic of Tb room masters .</p>"
  }
]
}
},
"success": {
"fields": {
"Success 200": [
{
"group": "Success 200",
"type": "Boolean",
"optional": false,
"field": "Status",
"description": "<p>status response api.</p>"
},
{
"group": "Success 200",
"type": "String",
"optional": false,
"field": "Message",
"description": "<p>message response api.</p>"
}
]
},
"examples": [
{
"title": "Success-Response:",
"content": "HTTP/1.1 200 OK",
"type": "json"
}
]
},
"error": {
"fields": {
"Error 4xx": [
{
"group": "Error 4xx",
"optional": false,
"field": "ValidationError",
"description": "<p>Error validation.</p>"
}
]
},
"examples": [
{
"title": "Error-Response:",
"content": "HTTP/1.1 403 Not Acceptable",
"type": "json"
}
]
},
"filename": "application/controllers/api/Tb_room_master.php",
"groupTitle": "Tb room master"
},
{
"type": "get",
"url": "/tb_room_master/all",
"title": "Get all Tb room masters.",
"version": "0.1.0",
"name": "Alltb_room_master",
"group": "tb_room_master",
"header": {
"fields": {
"Header": [
{
"group": "Header",
"type": "String",
"optional": false,
"field": "X-Api-Key",
"description": "<p>Tb room masters unique access-key.</p>"
},
{
"group": "Header",
"type": "String",
"optional": false,
"field": "X-Token",
"description": "<p>Tb room masters unique token.</p>"
}
]
}
},
"permission": [
{
"name": "{} Cant be Accessed permission name : api_Tb room master_all"
}
],
"parameter": {
"fields": {
"Parameter": [


{
"group": "Parameter",
"type": "String",
"optional": true,
"field": "Field",
"defaultValue": "All Field",
"description": "<p>Optional field of Tb room masters.</p>"
},
{
"group": "Parameter",
"type": "String",
"optional": true,
"field": "Start",
"defaultValue": "0",
"description": "<p>Optional start index of Tb room masters.</p>"
},
{
"group": "Parameter",
"type": "String",
"optional": true,
"field": "Limit",
"defaultValue": "10",
"description": "<p>Optional limit data of Tb room masters.</p>"
},
{
"group": "Parameter",
"type": "String",
"optional": true,
"field": "Sort_field",
"defaultValue": "id_room",
"description": "<p>Sort data by this field. id_room, kode_room, name_room</p>"
},
{
"group": "Parameter",
"type": "String",
"optional": true,
"field": "Sort_order",
"defaultValue": "DESC",
"description": "<p>Sort data order this field ASC or DESC.</p>"
},
{
"group": "Parameter",
"type": "String",
"optional": true,
"field": "Filters",
"defaultValue": "",
"description": "<p>filters[0][lg] = <code>AND</code>, <code>OR</code><br>filters[0][co][0][fl] = <code>id_room</code><br>filters[0][co][0][op] = <code>equal</code>, <code>not_equal</code>, <code>greather</code>, <code>greather_equal</code>, <code>smaller_equal</code>, <code>smaller</code>, <code>is_null</code>, <code>not_null</code>, <code>where_in</code>, <code>where_not_in</code>, <code>like</code><br>filters[0][co][0][vl] = 1<br>filters[0][co][0][lg] = <code>OR</code>, <code>AND</code><br><br><br><span class=\"label \">Note</span> : if use like operator you need append <code>%your term%</code> on vl<br>for <code>BETWEEN</code> or <code>IN</code> you can use val1, val2, ..etc</p>"
}
]
}
},
"success": {
"fields": {
"Success 200": [
{
"group": "Success 200",
"type": "Boolean",
"optional": false,
"field": "Status",
"description": "<p>status response api.</p>"
},
{
"group": "Success 200",
"type": "String",
"optional": false,
"field": "Message",
"description": "<p>message response api.</p>"
},
{
"group": "Success 200",
"type": "Array",
"optional": false,
"field": "Data",
"description": "<p>data of Tb room master.</p>"
}
]
},
"examples": [
{
"title": "Success-Response:",
"content": "HTTP/1.1 200 OK",
"type": "json"
}
]
},
"error": {
"fields": {
"Error 4xx": [
{
"group": "Error 4xx",
"optional": false,
"field": "NoDataTb room master",
"description": "<p>Tb room master data is nothing.</p>"
}
]
},
"examples": [
{
"title": "Error-Response:",
"content": "HTTP/1.1 403 Not Acceptable",
"type": "json"
}
]
},
"filename": "application/controllers/api/Tb room master.php",
"groupTitle": "Tb room master"
},
{
"type": "post",
"url": "/tb_room_master/delete",
"title": "Delete Tb room master.",
"version": "0.1.0",
"name": "Deletetb_room_master",
"group": "tb_room_master",
"header": {
"fields": {
"Header": [
{
"group": "Header",
"type": "String",
"optional": false,
"field": "X-Api-Key",
"description": "<p>Tb room masters unique access-key.</p>"
},
{
"group": "Header",
"type": "String",
"optional": false,
"field": "X-Token",
"description": "<p>Tb room masters unique token.</p>"
}
]
}
},
"permission": [
{
"name": "Tb room master Cant be Accessed permission name : api_Tb room master_delete"
}
],
"parameter": {
"fields": {
"Parameter": [
{
"group": "Parameter",
"type": "Integer",
"optional": false,
"field": "Id",
"description": "<p>Mandatory id of Tb room masters .</p>"
}
]
}
},
"success": {
"fields": {
"Success 200": [
{
"group": "Success 200",
"type": "Boolean",
"optional": false,
"field": "Status",
"description": "<p>status response api.</p>"
},
{
"group": "Success 200",
"type": "String",
"optional": false,
"field": "Message",
"description": "<p>message response api.</p>"
}
]
},
"examples": [
{
"title": "Success-Response:",
"content": "HTTP/1.1 200 OK",
"type": "json"
}
]
},
"error": {
"fields": {
"Error 4xx": [
{
"group": "Error 4xx",
"optional": false,
"field": "ValidationError",
"description": "<p>Error validation.</p>"
}
]
},
"examples": [
{
"title": "Error-Response:",
"content": "HTTP/1.1 403 Not Acceptable",
"type": "json"
}
]
},
"filename": "application/controllers/api/Tb room master.php",
"groupTitle": "Tb room master"
},
{
"type": "get",
"url": "/tb_room_master/detail",
"title": "Detail Tb room master.",
"version": "0.1.0",
"name": "Detailtb_room_master",
"group": "tb_room_master",
"header": {
"fields": {
"Header": [
{
"group": "Header",
"type": "String",
"optional": false,
"field": "X-Api-Key",
"description": "<p>Tb room masters unique access-key.</p>"
},
{
"group": "Header",
"type": "String",
"optional": false,
"field": "X-Token",
"description": "<p>Tb room masters unique token.</p>"
}
]
}
},
"permission": [
{
"name": "Tb room master Cant be Accessed permission name : api_Tb room master_detail"
}
],
"parameter": {
"fields": {
"Parameter": [
{
"group": "Parameter",
"type": "Integer",
"optional": false,
"field": "Id",
"description": "<p>Mandatory id of Tb room masters.</p>"
}
]
}
},
"success": {
"fields": {
"Success 200": [
{
"group": "Success 200",
"type": "Boolean",
"optional": false,
"field": "Status",
"description": "<p>status response api.</p>"
},
{
"group": "Success 200",
"type": "String",
"optional": false,
"field": "Message",
"description": "<p>message response api.</p>"
},
{
"group": "Success 200",
"type": "Array",
"optional": false,
"field": "Data",
"description": "<p>data of Tb room master.</p>"
}
]
},
"examples": [
{
"title": "Success-Response:",
"content": "HTTP/1.1 200 OK",
"type": "json"
}
]
},
"error": {
"fields": {
"Error 4xx": [
{
"group": "Error 4xx",
"optional": false,
"field": "Tb room masterNotFound",
"description": "<p>Tb room master data is not found.</p>"
}
]
},
"examples": [
{
"title": "Error-Response:",
"content": "HTTP/1.1 403 Not Acceptable",
"type": "json"
}
]
},
"filename": "application/controllers/api/Tb room master.php",
"groupTitle": "Tb room master"
},
{
"type": "post",
"url": "/tb_room_master/update",
"title": "Update Tb room master.",
"version": "0.1.0",
"name": "Updatetb_room_master",
"group": "tb_room_master",
"header": {
"fields": {
"Header": [
{
"group": "Header",
"type": "String",
"optional": false,
"field": "X-Api-Key",
"description": "<p>Tb room masters unique access-key.</p>"
},
{
"group": "Header",
"type": "String",
"optional": false,
"field": "X-Token",
"description": "<p>Tb room masters unique token.</p>"
}
]
}
},
"permission": [
{
"name": "Tb room master Cant be Accessed permission name : api_Tb room master_update"
}
],
"parameter": {
"fields": {
"Parameter": [
  {
  "group": "Parameter",
  "type": "String",
  "optional": false,
  "field": "Gedung_id",
  "description": "<p>Mandatory gedung_id of Tb room masters .</p>"
  },
  {
  "group": "Parameter",
  "type": "String",
  "optional": false,
  "field": "Kode_room",
  "description": "<p>Mandatory kode_room of Tb room masters Input Kode Room Max Length : 30..</p>"
  },
  {
  "group": "Parameter",
  "type": "String",
  "optional": false,
  "field": "Name_room",
  "description": "<p>Mandatory name_room of Tb room masters Input Name Room Max Length : 30..</p>"
  },
  {
  "group": "Parameter",
  "type": "String",
  "optional": false,
  "field": "Lat",
  "description": "<p>Mandatory lat of Tb room masters .</p>"
  },
  {
  "group": "Parameter",
  "type": "String",
  "optional": false,
  "field": "Long",
  "description": "<p>Mandatory long of Tb room masters .</p>"
  },
  {
  "group": "Parameter",
  "type": "String",
  "optional": false,
  "field": "Pic",
  "description": "<p>Mandatory pic of Tb room masters .</p>"
  }
]
}
},
"success": {
"fields": {
"Success 200": [
{
"group": "Success 200",
"type": "Boolean",
"optional": false,
"field": "Status",
"description": "<p>status response api.</p>"
},
{
"group": "Success 200",
"type": "String",
"optional": false,
"field": "Message",
"description": "<p>message response api.</p>"
}
]
},
"examples": [
{
"title": "Success-Response:",
"content": "HTTP/1.1 200 OK",
"type": "json"
}
]
},
"error": {
"fields": {
"Error 4xx": [
{
"group": "Error 4xx",
"optional": false,
"field": "ValidationError",
"description": "<p>Error validation.</p>"
}
]
},
"examples": [
{
"title": "Error-Response:",
"content": "HTTP/1.1 403 Not Acceptable",
"type": "json"
}
]
},
"filename": "application/controllers/api/Tb room master.php",
"groupTitle": "Tb room master"
},{
  "type": "post",
  "url": "/user/add",
  "title": "Add User.",
  "version": "0.1.0",
  "name": "AddUser",
  "group": "User",
  "header": {
    "fields": {
      "Header": [
        {
          "group": "Header",
          "type": "String",
          "optional": false,
          "field": "X-API-KEY",
          "description": "<p>Users unique access-key.</p>"
        },
        {
          "group": "Header",
          "type": "String",
          "optional": false,
          "field": "X-Token",
          "description": "<p>Users unique token.</p>"
        }
      ]
    }
  },
  "permission": [
    {
      "name": "Group Cant be Accessed permission name : api_user_add"
    }
  ],
  "parameter": {
    "fields": {
      "Parameter": [
        {
          "group": "Parameter",
          "type": "String",
          "optional": false,
          "field": "Username",
          "description": "<p>Mandatory username of Users.</p>"
        },
        {
          "group": "Parameter",
          "type": "String",
          "optional": false,
          "field": "Email",
          "description": "<p>Mandatory email of Users.</p>"
        },
        {
          "group": "Parameter",
          "type": "String",
          "optional": false,
          "field": "Password",
          "description": "<p>password of Users.</p>"
        },
        {
          "group": "Parameter",
          "type": "Array",
          "optional": true,
          "field": "Group",
          "defaultValue": "Default",
          "description": "<p>Optional group of Users.</p>"
        },
        {
          "group": "Parameter",
          "type": "File",
          "optional": true,
          "field": "Avatar",
          "defaultValue": "Default.PNG",
          "description": "<p>Optional avatar of Users.</p>"
        }
      ]
    }
  },
  "success": {
    "fields": {
      "Success 200": [
        {
          "group": "Success 200",
          "type": "Boolean",
          "optional": false,
          "field": "Status",
          "description": "<p>status response api.</p>"
        },
        {
          "group": "Success 200",
          "type": "String",
          "optional": false,
          "field": "Message",
          "description": "<p>message response api.</p>"
        }
      ]
    },
    "examples": [
      {
        "title": "Success-Response:",
        "content": "HTTP/1.1 200 OK",
        "type": "json"
      }
    ]
  },
  "error": {
    "fields": {
      "Error 4xx": [
        {
          "group": "Error 4xx",
          "optional": false,
          "field": "ValidationError",
          "description": "<p>Error validation.</p>"
        }
      ]
    },
    "examples": [
      {
        "title": "Error-Response:",
        "content": "HTTP/1.1 403 Not Acceptable",
        "type": "json"
      }
    ]
  },
  "filename": "application/controllers/api/User.php",
  "groupTitle": "User"
},
{
  "type": "get",
  "url": "/user/all",
  "title": "Get all users.",
  "version": "0.1.0",
  "name": "AllUser",
  "group": "User",
  "header": {
    "fields": {
      "Header": [
        {
          "group": "Header",
          "type": "String",
          "optional": false,
          "field": "X-API-KEY",
          "description": "<p>Users unique access-key.</p>"
        },
        {
          "group": "Header",
          "type": "String",
          "optional": false,
          "field": "X-Token",
          "description": "<p>Users unique token.</p>"
        }
      ]
    }
  },
  "permission": [
    {
      "name": "Group Cant be Accessed permission name : api_user_all"
    }
  ],
  "parameter": {
    "fields": {
      "Parameter": [
        {
          "group": "Parameter",
          "type": "String",
          "optional": true,
          "field": "Filter",
          "defaultValue": "null",
          "description": "<p>Optional filter of Users.</p>"
        },
        {
          "group": "Parameter",
          "type": "String",
          "optional": true,
          "field": "Field",
          "defaultValue": "All Field",
          "description": "<p>Optional field of Users.</p>"
        },
        {
          "group": "Parameter",
          "type": "String",
          "optional": true,
          "field": "Start",
          "defaultValue": "0",
          "description": "<p>Optional start index of Users.</p>"
        },
        {
          "group": "Parameter",
          "type": "String",
          "optional": true,
          "field": "Limit",
          "defaultValue": "10",
          "description": "<p>Optional limit data of Users.</p>"
        }
      ]
    }
  },
  "success": {
    "fields": {
      "Success 200": [
        {
          "group": "Success 200",
          "type": "Boolean",
          "optional": false,
          "field": "Status",
          "description": "<p>status response api.</p>"
        },
        {
          "group": "Success 200",
          "type": "String",
          "optional": false,
          "field": "Message",
          "description": "<p>message response api.</p>"
        },
        {
          "group": "Success 200",
          "type": "Array",
          "optional": false,
          "field": "Data",
          "description": "<p>data of user.</p>"
        }
      ]
    },
    "examples": [
      {
        "title": "Success-Response:",
        "content": "HTTP/1.1 200 OK",
        "type": "json"
      }
    ]
  },
  "error": {
    "fields": {
      "Error 4xx": [
        {
          "group": "Error 4xx",
          "optional": false,
          "field": "NoDataUser",
          "description": "<p>User data is nothing.</p>"
        }
      ]
    },
    "examples": [
      {
        "title": "Error-Response:",
        "content": "HTTP/1.1 403 Not Acceptable",
        "type": "json"
      }
    ]
  },
  "filename": "application/controllers/api/User.php",
  "groupTitle": "User"
},
{
  "type": "post",
  "url": "/user/delete",
  "title": "Delete User.",
  "version": "0.1.0",
  "name": "DeleteUser",
  "group": "User",
  "header": {
    "fields": {
      "Header": [
        {
          "group": "Header",
          "type": "String",
          "optional": false,
          "field": "X-API-KEY",
          "description": "<p>Users unique access-key.</p>"
        },
        {
          "group": "Header",
          "type": "String",
          "optional": false,
          "field": "X-Token",
          "description": "<p>Users unique token.</p>"
        }
      ]
    }
  },
  "permission": [
    {
      "name": "Group Cant be Accessed permission name : api_user_delete"
    }
  ],
  "parameter": {
    "fields": {
      "Parameter": [
        {
          "group": "Parameter",
          "type": "Integer",
          "optional": false,
          "field": "Id",
          "description": "<p>mandatory id of Users .</p>"
        }
      ]
    }
  },
  "success": {
    "fields": {
      "Success 200": [
        {
          "group": "Success 200",
          "type": "Boolean",
          "optional": false,
          "field": "Status",
          "description": "<p>status response api.</p>"
        },
        {
          "group": "Success 200",
          "type": "String",
          "optional": false,
          "field": "Message",
          "description": "<p>message response api.</p>"
        }
      ]
    },
    "examples": [
      {
        "title": "Success-Response:",
        "content": "HTTP/1.1 200 OK",
        "type": "json"
      }
    ]
  },
  "error": {
    "fields": {
      "Error 4xx": [
        {
          "group": "Error 4xx",
          "optional": false,
          "field": "ValidationError",
          "description": "<p>Error validation.</p>"
        }
      ]
    },
    "examples": [
      {
        "title": "Error-Response:",
        "content": "HTTP/1.1 403 Not Acceptable",
        "type": "json"
      }
    ]
  },
  "filename": "application/controllers/api/User.php",
  "groupTitle": "User"
},
{
  "type": "get",
  "url": "/user/detail",
  "title": "Detail User.",
  "version": "0.1.0",
  "name": "DetailUser",
  "group": "User",
  "header": {
    "fields": {
      "Header": [
        {
          "group": "Header",
          "type": "String",
          "optional": false,
          "field": "X-API-KEY",
          "description": "<p>Users unique access-key.</p>"
        },
        {
          "group": "Header",
          "type": "String",
          "optional": false,
          "field": "X-Token",
          "description": "<p>Users unique token.</p>"
        }
      ]
    }
  },
  "permission": [
    {
      "name": "Group Cant be Accessed permission name : api_user_detail"
    }
  ],
  "parameter": {
    "fields": {
      "Parameter": [
        {
          "group": "Parameter",
          "type": "Integer",
          "optional": false,
          "field": "Id",
          "description": "<p>Mandatory id of Users.</p>"
        }
      ]
    }
  },
  "success": {
    "fields": {
      "Success 200": [
        {
          "group": "Success 200",
          "type": "Boolean",
          "optional": false,
          "field": "Status",
          "description": "<p>status response api.</p>"
        },
        {
          "group": "Success 200",
          "type": "String",
          "optional": false,
          "field": "Message",
          "description": "<p>message response api.</p>"
        },
        {
          "group": "Success 200",
          "type": "Array",
          "optional": false,
          "field": "Data",
          "description": "<p>data of user.</p>"
        }
      ]
    },
    "examples": [
      {
        "title": "Success-Response:",
        "content": "HTTP/1.1 200 OK",
        "type": "json"
      }
    ]
  },
  "error": {
    "fields": {
      "Error 4xx": [
        {
          "group": "Error 4xx",
          "optional": false,
          "field": "UserNotFound",
          "description": "<p>User data is not found.</p>"
        }
      ]
    },
    "examples": [
      {
        "title": "Error-Response:",
        "content": "HTTP/1.1 403 Not Acceptable",
        "type": "json"
      }
    ]
  },
  "filename": "application/controllers/api/User.php",
  "groupTitle": "User"
},
{
  "type": "post",
  "url": "/user/login",
  "title": "User login authentication.",
  "version": "0.1.0",
  "name": "LoginUser",
  "group": "User",
  "header": {
    "fields": {
      "Header": [
        {
          "group": "Header",
          "type": "String",
          "optional": false,
          "field": "X-API-KEY",
          "description": "<p>Users unique access-key.</p>"
        }
      ]
    }
  },
  "permission": [
    {
      "name": "none"
    }
  ],
  "parameter": {
    "fields": {
      "Parameter": [
        {
          "group": "Parameter",
          "type": "String",
          "optional": false,
          "field": "Username",
          "description": "<p>Mandatory username of Users.</p>"
        },
        {
          "group": "Parameter",
          "type": "String",
          "optional": false,
          "field": "Password",
          "description": "<p>Mandatory password of Users.</p>"
        }
      ]
    }
  },
  "success": {
    "fields": {
      "Success 200": [
        {
          "group": "Success 200",
          "type": "Boolean",
          "optional": false,
          "field": "Status",
          "description": "<p>status response api.</p>"
        },
        {
          "group": "Success 200",
          "type": "String",
          "optional": false,
          "field": "Message",
          "description": "<p>message response api.</p>"
        },
        {
          "group": "Success 200",
          "type": "Array",
          "optional": false,
          "field": "Data",
          "description": "<p>data of user.</p>"
        },
        {
          "group": "Success 200",
          "type": "String",
          "optional": false,
          "field": "Token",
          "description": "<p>token for access api.</p>"
        }
      ]
    },
    "examples": [
      {
        "title": "Success-Response:",
        "content": "HTTP/1.1 200 OK",
        "type": "json"
      }
    ]
  },
  "error": {
    "fields": {
      "Error 4xx": [
        {
          "group": "Error 4xx",
          "optional": false,
          "field": "InvalidCredential",
          "description": "<p>The username or password is invalid.</p>"
        }
      ]
    },
    "examples": [
      {
        "title": "Error-Response:",
        "content": "HTTP/1.1 403 Not Acceptable",
        "type": "json"
      }
    ]
  },
  "filename": "application/controllers/api/User.php",
  "groupTitle": "User"
},
{
  "type": "post",
  "url": "/user/request_token",
  "title": "User request token.",
  "version": "0.1.0",
  "name": "RequestTokenUser",
  "group": "User",
  "header": {
    "fields": {
      "Header": [
        {
          "group": "Header",
          "type": "String",
          "optional": false,
          "field": "X-API-KEY",
          "description": "<p>Users unique access-key.</p>"
        }
      ]
    }
  },
  "permission": [
    {
      "name": "none"
    }
  ],
  "parameter": {
    "fields": {
      "Parameter": [
        {
          "group": "Parameter",
          "type": "String",
          "optional": false,
          "field": "Username",
          "description": "<p>Mandatory username of Users.</p>"
        },
        {
          "group": "Parameter",
          "type": "String",
          "optional": false,
          "field": "Password",
          "description": "<p>Mandatory password of Users.</p>"
        }
      ]
    }
  },
  "success": {
    "fields": {
      "Success 200": [
        {
          "group": "Success 200",
          "type": "String",
          "optional": false,
          "field": "Token",
          "description": "<p>token for access api.</p>"
        }
      ]
    },
    "examples": [
      {
        "title": "Success-Response:",
        "content": "HTTP/1.1 200 OK",
        "type": "json"
      }
    ]
  },
  "error": {
    "fields": {
      "Error 4xx": [
        {
          "group": "Error 4xx",
          "optional": false,
          "field": "InvalidCredential",
          "description": "<p>The username or password is invalid.</p>"
        }
      ]
    },
    "examples": [
      {
        "title": "Error-Response:",
        "content": "HTTP/1.1 403 Not Acceptable",
        "type": "json"
      }
    ]
  },
  "filename": "application/controllers/api/User.php",
  "groupTitle": "User"
},
{
  "type": "get",
  "url": "/user/profile",
  "title": "Profile User.",
  "version": "0.1.0",
  "name": "ProfileUser",
  "group": "User",
  "header": {
    "fields": {
      "Header": [
        {
          "group": "Header",
          "type": "String",
          "optional": false,
          "field": "X-API-KEY",
          "description": "<p>Users unique access-key.</p>"
        },
        {
          "group": "Header",
          "type": "String",
          "optional": false,
          "field": "X-Token",
          "description": "<p>Users unique token.</p>"
        }
      ]
    }
  },
  "permission": [
    {
      "name": "Group Cant be Accessed permission name : api_user_profile"
    }
  ],
  "success": {
    "fields": {
      "Success 200": [
        {
          "group": "Success 200",
          "type": "Boolean",
          "optional": false,
          "field": "Status",
          "description": "<p>status response api.</p>"
        },
        {
          "group": "Success 200",
          "type": "String",
          "optional": false,
          "field": "Message",
          "description": "<p>message response api.</p>"
        },
        {
          "group": "Success 200",
          "type": "Array",
          "optional": false,
          "field": "Data",
          "description": "<p>data of user.</p>"
        }
      ]
    },
    "examples": [
      {
        "title": "Success-Response:",
        "content": "HTTP/1.1 200 OK",
        "type": "json"
      }
    ]
  },
  "error": {
    "fields": {
      "Error 4xx": [
        {
          "group": "Error 4xx",
          "optional": false,
          "field": "UserNotFound",
          "description": "<p>User data is not found.</p>"
        }
      ]
    },
    "examples": [
      {
        "title": "Error-Response:",
        "content": "HTTP/1.1 403 Not Acceptable",
        "type": "json"
      }
    ]
  },
  "filename": "application/controllers/api/User.php",
  "groupTitle": "User"
},
{
  "type": "post",
  "url": "/user/update_profile",
  "title": "Update Profile User.",
  "version": "0.1.0",
  "name": "UpdateProfileUser",
  "group": "User",
  "header": {
    "fields": {
      "Header": [
        {
          "group": "Header",
          "type": "String",
          "optional": false,
          "field": "X-API-KEY",
          "description": "<p>Users unique access-key.</p>"
        },
        {
          "group": "Header",
          "type": "String",
          "optional": false,
          "field": "X-Token",
          "description": "<p>Users unique token.</p>"
        }
      ]
    }
  },
  "permission": [
    {
      "name": "Group Cant be Accessed permission name : api_user_update"
    }
  ],
  "parameter": {
    "fields": {
      "Parameter": [
        {
          "group": "Parameter",
          "type": "String",
          "optional": false,
          "field": "Email",
          "description": "<p>Mandatory email of Users.</p>"
        },
        {
          "group": "Parameter",
          "type": "String",
          "optional": false,
          "field": "Password",
          "description": "<p>password of Users.</p>"
        },
        {
          "group": "Parameter",
          "type": "File",
          "optional": true,
          "field": "Avatar",
          "defaultValue": "Default.PNG",
          "description": "<p>Optional avatar of Users.</p>"
        }
      ]
    }
  },
  "success": {
    "fields": {
      "Success 200": [
        {
          "group": "Success 200",
          "type": "Boolean",
          "optional": false,
          "field": "Status",
          "description": "<p>status response api.</p>"
        },
        {
          "group": "Success 200",
          "type": "String",
          "optional": false,
          "field": "Message",
          "description": "<p>message response api.</p>"
        }
      ]
    },
    "examples": [
      {
        "title": "Success-Response:",
        "content": "HTTP/1.1 200 OK",
        "type": "json"
      }
    ]
  },
  "error": {
    "fields": {
      "Error 4xx": [
        {
          "group": "Error 4xx",
          "optional": false,
          "field": "ValidationError",
          "description": "<p>Error validation.</p>"
        }
      ]
    },
    "examples": [
      {
        "title": "Error-Response:",
        "content": "HTTP/1.1 403 Not Acceptable",
        "type": "json"
      }
    ]
  },
  "filename": "application/controllers/api/User.php",
  "groupTitle": "User"
},
{
  "type": "post",
  "url": "/user/update",
  "title": "Update User.",
  "version": "0.1.0",
  "name": "UpdateUser",
  "group": "User",
  "header": {
    "fields": {
      "Header": [
        {
          "group": "Header",
          "type": "String",
          "optional": false,
          "field": "X-API-KEY",
          "description": "<p>Users unique access-key.</p>"
        },
        {
          "group": "Header",
          "type": "String",
          "optional": false,
          "field": "X-Token",
          "description": "<p>Users unique token.</p>"
        }
      ]
    }
  },
  "permission": [
    {
      "name": "Group Cant be Accessed permission name : api_user_update"
    }
  ],
  "parameter": {
    "fields": {
      "Parameter": [
        {
          "group": "Parameter",
          "type": "String",
          "optional": false,
          "field": "Email",
          "description": "<p>Mandatory email of Users.</p>"
        },
        {
          "group": "Parameter",
          "type": "String",
          "optional": false,
          "field": "Password",
          "description": "<p>password of Users.</p>"
        },
        {
          "group": "Parameter",
          "type": "Array",
          "optional": true,
          "field": "Group",
          "defaultValue": "Default",
          "description": "<p>Optional group of Users.</p>"
        },
        {
          "group": "Parameter",
          "type": "File",
          "optional": true,
          "field": "Avatar",
          "defaultValue": "Default.PNG",
          "description": "<p>Optional avatar of Users.</p>"
        },
        {
          "group": "Parameter",
          "type": "Integer",
          "optional": false,
          "field": "Id",
          "description": "<p>Mandatory id of Users.</p>"
        }
      ]
    }
  },
  "success": {
    "fields": {
      "Success 200": [
        {
          "group": "Success 200",
          "type": "Boolean",
          "optional": false,
          "field": "Status",
          "description": "<p>status response api.</p>"
        },
        {
          "group": "Success 200",
          "type": "String",
          "optional": false,
          "field": "Message",
          "description": "<p>message response api.</p>"
        }
      ]
    },
    "examples": [
      {
        "title": "Success-Response:",
        "content": "HTTP/1.1 200 OK",
        "type": "json"
      }
    ]
  },
  "error": {
    "fields": {
      "Error 4xx": [
        {
          "group": "Error 4xx",
          "optional": false,
          "field": "ValidationError",
          "description": "<p>Error validation.</p>"
        }
      ]
    },
    "examples": [
      {
        "title": "Error-Response:",
        "content": "HTTP/1.1 403 Not Acceptable",
        "type": "json"
      }
    ]
  },
  "filename": "application/controllers/api/User.php",
  "groupTitle": "User"
},
{
  "type": "post",
  "url": "/user/remind_password",
  "title": "Update Remind password.",
  "version": "0.1.0",
  "name": "RemindPasswordUser",
  "group": "User",
  "header": {
    "fields": {
      "Header": [
        {
          "group": "Header",
          "type": "String",
          "optional": false,
          "field": "X-API-KEY",
          "description": "<p>Users unique access-key.</p>"
        },
        {
          "group": "Header",
          "type": "String",
          "optional": false,
          "field": "X-Token",
          "description": "<p>Users unique token.</p>"
        }
      ]
    }
  },
  "permission": [
    {
      "name": "Group Cant be Accessed permission name : api_user_update"
    }
  ],
  "parameter": {
    "fields": {
      "Parameter": [
        {
          "group": "Parameter",
          "type": "String",
          "optional": false,
          "field": "Email",
          "description": "<p>Mandatory email of Users.</p>"
        }
      ]
    }
  },
  "success": {
    "fields": {
      "Success 200": [
        {
          "group": "Success 200",
          "type": "Boolean",
          "optional": false,
          "field": "Status",
          "description": "<p>status response api.</p>"
        },
        {
          "group": "Success 200",
          "type": "String",
          "optional": false,
          "field": "Message",
          "description": "<p>message response api.</p>"
        }
      ]
    },
    "examples": [
      {
        "title": "Success-Response:",
        "content": "HTTP/1.1 200 OK",
        "type": "json"
      }
    ]
  },
  "error": {
    "fields": {
      "Error 4xx": [
        {
          "group": "Error 4xx",
          "optional": false,
          "field": "ValidationError",
          "description": "<p>Error validation.</p>"
        }
      ]
    },
    "examples": [
      {
        "title": "Error-Response:",
        "content": "HTTP/1.1 403 Not Acceptable",
        "type": "json"
      }
    ]
  },
  "filename": "application/controllers/api/User.php",
  "groupTitle": "User"
},
{
  "type": "post",
  "url": "/user/reset_password",
  "title": "Update Reset Password.",
  "version": "0.1.0",
  "name": "ResetPasswordUser",
  "group": "User",
  "header": {
    "fields": {
      "Header": [
        {
          "group": "Header",
          "type": "String",
          "optional": false,
          "field": "X-API-KEY",
          "description": "<p>Users unique access-key.</p>"
        },
        {
          "group": "Header",
          "type": "String",
          "optional": false,
          "field": "X-Token",
          "description": "<p>Users unique token.</p>"
        }
      ]
    }
  },
  "permission": [
    {
      "name": "Group Cant be Accessed permission name : api_user_update"
    }
  ],
  "parameter": {
    "fields": {
      "Parameter": [
        {
          "group": "Parameter",
          "type": "String",
          "optional": false,
          "field": "Reset_token",
          "description": "<p>Token from e-mail.</p>"
        },
        {
          "group": "Parameter",
          "type": "String",
          "optional": false,
          "field": "password",
          "description": "<p>New password.</p>"
        },
        {
          "group": "Parameter",
          "type": "String",
          "optional": false,
          "field": "password_confirmation",
          "description": "<p>New password confirmation.</p>"
        }
      ]
    }
  },
  "success": {
    "fields": {
      "Success 200": [
        {
          "group": "Success 200",
          "type": "Boolean",
          "optional": false,
          "field": "Status",
          "description": "<p>status response api.</p>"
        },
        {
          "group": "Success 200",
          "type": "String",
          "optional": false,
          "field": "Message",
          "description": "<p>message response api.</p>"
        }
      ]
    },
    "examples": [
      {
        "title": "Success-Response:",
        "content": "HTTP/1.1 200 OK",
        "type": "json"
      }
    ]
  },
  "error": {
    "fields": {
      "Error 4xx": [
        {
          "group": "Error 4xx",
          "optional": false,
          "field": "ValidationError",
          "description": "<p>Error validation.</p>"
        }
      ]
    },
    "examples": [
      {
        "title": "Error-Response:",
        "content": "HTTP/1.1 403 Not Acceptable",
        "type": "json"
      }
    ]
  },
  "filename": "application/controllers/api/User.php",
  "groupTitle": "User"
}] });
