const nav = document.querySelector(".nav"),
  searchIcon = document.querySelector("#searchIcon"),
  navOpenBtn = document.querySelector(".navOpenBtn"),
  navCloseBtn = document.querySelector(".navCloseBtn");

// searchIcon.addEventListener("click", () => {
//   nav.classList.toggle("openSearch");
//   nav.classList.remove("openNav");
//   if (nav.classList.contains("openSearch")) {
//     return searchIcon.classList.replace("uil-search", "uil-times");
//   }
//   searchIcon.classList.replace("uil-times", "uil-search");
// });

// navOpenBtn.addEventListener("click", () => {
//   nav.classList.add("openNav");
//   nav.classList.remove("openSearch");
//   searchIcon.classList.replace("uil-times", "uil-search");
// });
// navCloseBtn.addEventListener("click", () => {
//   nav.classList.remove("openNav");
// });



/*multiple checkbox - drop down*/
const selectBtn = $(".select-btn"),
      items = document.querySelectorAll(".item");

$(".select-btn").click(function() {
    // $(this).on("click", function() {
        $(".select-btn").removeClass("open");
        $(this).toggleClass("open");
        console.log($(this))
    // })
})

// items.forEach(item => {
//     item.addEventListener("click", () => {
//         item.classList.toggle("checked");

//         let checked = document.querySelectorAll(".checked"),
//             btnText = document.querySelector(".btn-text");

//             if(checked && checked.length > 0){
//                 btnText.innerText = `${checked.length} Selected`;
//             }else{
//                 btnText.innerText = "Select Language";
//             }
//     });
// })

$(".item").click(function(e) {
    $(this).toggleClass("checked");
    let input = $(this).siblings(".hidden_checkbox_input");

    if($(this).hasClass("checked")) {
        // item is selected so add item to hidden list
        if(input.val() !== "") {
            let items = input.val().split(",");
            items.push($(this).find(".item-text").text().toLowerCase());
            input.val(items.join(","));
        } else{
            input.val($(this).find(".item-text").text().toLowerCase());

        }
    } else {
        // item is un selected so removed item from hidden list
        let items = input.val().split(","),
            index = items.indexOf($(this).find(".item-text").text().toLowerCase());
        if (index > -1) {
            items.splice(index, 1);
            input.val(items.join(","));
        }
    }

    let checked = $(this).closest('.list-items').find(".checked"),
        btnText = $(e.target).closest('.list-items').prev(".select-btn").find(".btn-text");

    if (checked.length > 0) {
        btnText.text(`${checked.length} Selected`);
    } else {
        btnText.text(btnText.data("btn-text"));
    }
});




/*ck-editor*/
// var editor = CKEDITOR.replace( 'editor1', {
//   height: 300,
//   extraPlugins: 'mentions',
//   mentions: [ {
//       feed: dataFeed,
//       itemTemplate:
//         '<li data-id="{id}">' +
//         '<strong class="username">{username}</strong>' +
//         '<span class="fullname">{fullname}</span>' +
//         '</li>',
//       outputTemplate:
//         '<a href="mailto:{username}@example.com">@{username}</a><span>&nbsp;</span>',
//       minChars: 0
//     }
//   ]
// } );

// editor.on( 'instanceReady', function ( evt ) {
//   // Attach to evey mentions instance.
//   CKEDITOR.tools.array.forEach( evt.editor.plugins.mentions.instances, function( mentionsInstance ) {
//     // See https://ckeditor.com/docs/ckeditor4/latest/api/CKEDITOR_plugins_autocomplete_model.html#event-change-isActive.
//     mentionsInstance._autocomplete.model.on( 'change-isActive', function( evt ) {
//       console.log( evt.data ); // True if panel is visible, false otherwise.
//     } );
//   } );
// }, null, null, 11 ); // We need higher priority than default one (10), since instances are created in the same event listener with default priority.

// Sample mentions data.
var users = [
  {
    id: 1,
    avatar: "m_1",
    fullname: "Charles Flores",
    username: "cflores"
  },
  {
    id: 2,
    avatar: "m_2",
    fullname: "Gerald Jackson",
    username: "gjackson"
  },
  {
    id: 3,
    avatar: "m_3",
    fullname: "Wayne Reed",
    username: "wreed"
  },
  {
    id: 4,
    avatar: "m_4",
    fullname: "Louis Garcia",
    username: "lgarcia"
  },
  {
    id: 5,
    avatar: "m_5",
    fullname: "Roy Wilson",
    username: "rwilson"
  },
  {
    id: 6,
    avatar: "m_6",
    fullname: "Matthew Nelson",
    username: "mnelson"
  },
  {
    id: 7,
    avatar: "m_7",
    fullname: "Randy Williams",
    username: "rwilliams"
  },
  {
    id: 8,
    avatar: "m_8",
    fullname: "Albert Johnson",
    username: "ajohnson"
  },
  {
    id: 9,
    avatar: "m_9",
    fullname: "Steve Roberts",
    username: "sroberts"
  },
  {
    id: 10,
    avatar: "m_10",
    fullname: "Kevin Evans",
    username: "kevans"
  },

  {
    id: 11,
    avatar: "w_1",
    fullname: "Mildred Wilson",
    username: "mwilson"
  },
  {
    id: 12,
    avatar: "w_2",
    fullname: "Melissa Nelson",
    username: "mnelson"
  },
  {
    id: 13,
    avatar: "w_3",
    fullname: "Kathleen Allen",
    username: "kallen"
  },
  {
    id: 14,
    avatar: "w_4",
    fullname: "Mary Young",
    username: "myoung"
  },
  {
    id: 15,
    avatar: "w_5",
    fullname: "Ashley Rogers",
    username: "arogers"
  },
  {
    id: 16,
    avatar: "w_6",
    fullname: "Debra Griffin",
    username: "dgriffin"
  },
  {
    id: 17,
    avatar: "w_7",
    fullname: "Denise Williams",
    username: "dwilliams"
  },
  {
    id: 18,
    avatar: "w_8",
    fullname: "Amy James",
    username: "ajames"
  },
  {
    id: 19,
    avatar: "w_9",
    fullname: "Ruby Anderson",
    username: "randerson"
  },
  {
    id: 20,
    avatar: "w_10",
    fullname: "Wanda Lee",
    username: "wlee"
  }
];

function dataFeed(opts, callback) {
  var matchProperty = 'username',
      data = users.filter(function(item) {
        return item[matchProperty].indexOf(opts.query.toLowerCase()) == 0;
      });

  data = data.sort(function(a, b) {
    return a[matchProperty].localeCompare(b[matchProperty], undefined, {
      sensitivity: 'accent'
    });
  });

  callback(data);
}

/*popup*/
$(document).ready(function() {
    $('a[data-confirm]').click(function(ev) {
        var href = $(this).attr('href');

        if (!$('#dataConfirmModal').length) {
            $('body').append('<div id="dataConfirmModal" class="modal" role="dialog" aria-labelledby="dataConfirmLabel" aria-hidden="true"><div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button><h3 id="dataConfirmLabel">Please Confirm</h3></div><div class="modal-body"></div><div class="modal-footer"><button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button><a class="btn btn-primary" id="dataConfirmOK">OK</a></div></div>');
        }
        $('#dataConfirmModal').find('.modal-body').text($(this).attr('data-confirm'));
        $('#dataConfirmOK').attr('href', href);
        $('#dataConfirmModal').modal({show:true});
        return false;
    });
});

$('#confirm-delete').on('show.bs.modal', function(e) {
    $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
});
