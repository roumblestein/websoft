using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;
using Microsoft.AspNetCore.Http;
using Microsoft.AspNetCore.Mvc;
using Webapp.models;
using Webapp.services;

namespace Webapp.Controller
{
    [Route("api/accounts")]
    [ApiController]
    public class AccountController : ControllerBase
    {

        public AccountController(AccountService accountService)
        {
            this.AccountServices = accountService;
        }

        public AccountService AccountServices { get; }

        [HttpGet]
        public IEnumerable<account> Get()
        {
            return AccountServices.GetAccounts();
        }


        [HttpGet("{number}")]
        public ActionResult<account> GetByNumber(int number)
        {
            account result = null;
            foreach (var account in Get())
            {
                if (account.Number == number)
                {
                    result = account;
                }
            }
            if (result == null)
            {
                return NotFound();
            }

            return result;

        }
    }

    
}