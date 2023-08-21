// Single Tag Item Example
[
	{
        "tagDirectory": "Library\\HTML\\Tag", // (Optional) Namespace of Class Defalult: "Library\\HTML\\Tag" (Namespace of AbstractStruct Class [__NAMESPACE__])
		"tagName": "Area\\Header", // Class Name with sub namespace 
		"tagID": "PageHeader",
		"position": 0, // (Optional) Position of Tag in List. Have to be greater of equal to 0
		"input": // (Optional) Attribute list of tag shown in HTML open tag
		{
			"id": "PageHeader",
            "class": "topbar",
            // ... and so on, depending on tag type

			"events": // Events only in body and children tags
			{
				 // (name_xxx) Only properties from JavaScriptEventDTO & JavaScriptBodyEventDTO allowed
				"name1": "value1",
				"name2": "value2"
			},
			"data": // Data only in body and children tags
			{
				// Every (name_xxx) will be added by data-*
				"name1": "value1",
				"name2": "value2"
			}
		}
	}
]
// Multiple Tag Item Example
[
	{
		"tagName": "Area\\Header",
		"tagID": "PageHeader",
		"input":
		{
			"id": "PageHeader",
            "class": "topbar"
		}
	},
	{
		"tagName": "Area\\Main",
		"tagID": "PageMain",
		"input":
		{
			"id": "MainArea",
            "class": "dark-bg"
		}
	},
	{
		"tagName": "Area\\Footer",
		"tagID": "PageFooter"
	}
]
// Nested Tag Item Example
[
	{
		"tagName": "Area\\Main",
		"tagID": "PageMain",
		"innerContent": // Nested Tag Items & Tag Content
		[
			{
				"tagName": "Area\\Nav",
				"tagID": "PageNavigation",
				"innerContent":
				[
					{
						"tagName": "Block\\Div",
						"tagID": "Div1"
					}
				]
			}
		]
	}
]
// Single Tag Content Example
[
	{
		"innerContent":
		[
			{
				"content": "Header", // Content of Parent Tag Item
				"position": 0 // (Optional) Position of Tag in List. Have to be greater of equal to 0
			}
		]
	}
]
// Multiple Tag Content Example
[
	{
		"innerContent":
		[
			{
				"content": "Two"
			}
		]
	},
	{
		"innerContent":
		[
			{
				"content": "One ",
				"position": 0 // Set position of Content to first position in List (Output: "One Two")
			}
		]
	}
]
// Nested Tag Item & Tag Content Example
[
	{
		"tagName": "Area\\Main",
		"tagID": "PageMain",
		"innerContent":
		[
			{
				"tagName": "Block\\H1",
				"tagID": "H1",
				"innerContent":
				[
					{
						"content": "First H1 Header"
					}
				]
			},
			{
				"tagName": "Area\\Nav",
				"tagID": "PageNavigation",
				"innerContent":
				[
					{
						"tagName": "Block\\Div",
						"tagID": "Div1",
						"innerContent":
						[
							{
								"content": "Ouput 1"
							},
							{
								"tagName": "Block\\Div",
								"tagID": "Div2",
								"innerContent":
								[
									{
										"content": "Ouput 2"
									},
									{
										"tagName": "Block\\Div",
										"tagID": "Div3",
										"innerContent":
										[
											{
												"content": "Ouput 3"
											}
										]
									}
								]
							},
							{
								"content": "Output 4"
							}
						]
					}
				]
			}
		]
	}
]