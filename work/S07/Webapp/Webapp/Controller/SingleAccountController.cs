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
    [Route("api/account")]
    [ApiController]
    public class SingleAccountController : ControllerBase
    {
        public SingleAccountController(AccountService accountService)
        {
            this.AccountServices = accountService;
        }

        public AccountService AccountServices { get; }

        public IEnumerable<account> Get()
        {
            return AccountServices.GetAccounts();
        }
    }
}